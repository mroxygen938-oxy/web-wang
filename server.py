#!/usr/bin/env python3
import http.server
import socketserver
import os
import json
import time
from urllib.parse import parse_qs, urlparse

PORT = 8000
DIRECTORY = os.path.dirname(os.path.abspath(__file__))

class WanglingRequestHandler(http.server.SimpleHTTPRequestHandler):
    def __init__(self, *args, **kwargs):
        super().__init__(*args, directory=DIRECTORY, **kwargs)

    def do_GET(self):
        parsed_path = urlparse(self.path).path
        
        # Route clean URLs & PHP endpoints to generated static HTML files
        if parsed_path in ['/', '/index', '/index.php']:
            self.path = '/index.html'
        elif parsed_path in ['/product', '/product.php']:
            self.path = '/product.html'
        elif parsed_path in ['/updates', '/updates.php']:
            self.path = '/updates.html'
            
        return super().do_GET()

    def do_POST(self):
        parsed_path = urlparse(self.path).path
        
        if parsed_path in ['/api/submit_inquiry.php', '/api/submit_inquiry']:
            content_length = int(self.headers.get('Content-Length', 0))
            body = self.rfile.read(content_length)
            
            data = {}
            content_type = self.headers.get('Content-Type', '')
            if 'application/json' in content_type:
                try:
                    data = json.loads(body.decode('utf-8'))
                except Exception:
                    data = {}
            else:
                parsed_body = parse_qs(body.decode('utf-8'))
                data = {k: v[0] for k, v in parsed_body.items()}
                
            name = data.get('name', '').strip()
            email = data.get('email', '').strip()
            subject = data.get('subject', 'Zenith Prism Inquiry').strip()
            message = data.get('message', '').strip()
            
            if not name or not email or not message:
                self.send_response(400)
                self.send_header('Content-Type', 'application/json')
                self.end_headers()
                response = {
                    'success': False,
                    'message': 'Please fill in all required fields (Name, Email, and Message).'
                }
                self.wfile.write(json.dumps(response).encode('utf-8'))
                return
                
            inquiry_dir = os.path.join(DIRECTORY, 'data', 'inquiries')
            os.makedirs(inquiry_dir, exist_ok=True)
            inquiry_file = os.path.join(inquiry_dir, 'inquiries.json')
            
            inquiry_record = {
                'id': f'inq_{int(time.time()*1000)}',
                'timestamp': time.strftime('%Y-%m-%d %H:%M:%S'),
                'name': name,
                'email': email,
                'subject': subject,
                'message': message,
                'ip': self.client_address[0]
            }
            
            records = []
            if os.path.exists(inquiry_file):
                try:
                    with open(inquiry_file, 'r', encoding='utf-8') as f:
                        records = json.load(f)
                except Exception:
                    records = []
                    
            records.append(inquiry_record)
            
            with open(inquiry_file, 'w', encoding='utf-8') as f:
                json.dump(records, f, indent=2)
                
            self.send_response(200)
            self.send_header('Content-Type', 'application/json')
            self.end_headers()
            response = {
                'success': True,
                'message': 'Thank you! Your inquiry has been submitted successfully.'
            }
            self.wfile.write(json.dumps(response).encode('utf-8'))
            return
            
        self.send_response(404)
        self.end_headers()

if __name__ == '__main__':
    with socketserver.TCPServer(("", PORT), WanglingRequestHandler) as httpd:
        print(f"Serving Wangling Cloud website at http://localhost:{PORT}")
        print(f"Local access: http://127.0.0.1:{PORT}")
        try:
            httpd.serve_forever()
        except KeyboardInterrupt:
            print("\nServer stopped.")
