---
name: Lumina Glass
colors:
  surface: '#0b1326'
  surface-dim: '#0b1326'
  surface-bright: '#31394d'
  surface-container-lowest: '#060e20'
  surface-container-low: '#131b2e'
  surface-container: '#171f33'
  surface-container-high: '#222a3d'
  surface-container-highest: '#2d3449'
  on-surface: '#dae2fd'
  on-surface-variant: '#c7c4d8'
  inverse-surface: '#dae2fd'
  inverse-on-surface: '#283044'
  outline: '#908fa1'
  outline-variant: '#464556'
  surface-tint: '#c1c1ff'
  primary: '#c1c1ff'
  on-primary: '#1500a8'
  primary-container: '#5d5cff'
  on-primary-container: '#fdf9ff'
  inverse-primary: '#4643e9'
  secondary: '#ddb8ff'
  on-secondary: '#490081'
  secondary-container: '#62259b'
  on-secondary-container: '#d1a1ff'
  tertiary: '#ffb691'
  on-tertiary: '#552000'
  tertiary-container: '#bf5200'
  on-tertiary-container: '#fff9f7'
  error: '#ffb4ab'
  on-error: '#690005'
  error-container: '#93000a'
  on-error-container: '#ffdad6'
  primary-fixed: '#e1dfff'
  primary-fixed-dim: '#c1c1ff'
  on-primary-fixed: '#09006b'
  on-primary-fixed-variant: '#2b20d2'
  secondary-fixed: '#f0dbff'
  secondary-fixed-dim: '#ddb8ff'
  on-secondary-fixed: '#2c0051'
  on-secondary-fixed-variant: '#62259b'
  tertiary-fixed: '#ffdbcb'
  tertiary-fixed-dim: '#ffb691'
  on-tertiary-fixed: '#341100'
  on-tertiary-fixed-variant: '#793100'
  background: '#0b1326'
  on-background: '#dae2fd'
  surface-variant: '#2d3449'
typography:
  display-lg:
    fontFamily: Sora
    fontSize: 48px
    fontWeight: '700'
    lineHeight: '1.1'
    letterSpacing: -0.02em
  display-lg-mobile:
    fontFamily: Sora
    fontSize: 32px
    fontWeight: '700'
    lineHeight: '1.2'
    letterSpacing: -0.02em
  headline-md:
    fontFamily: Sora
    fontSize: 24px
    fontWeight: '600'
    lineHeight: '1.3'
  body-lg:
    fontFamily: Inter
    fontSize: 18px
    fontWeight: '400'
    lineHeight: '1.6'
  body-md:
    fontFamily: Inter
    fontSize: 16px
    fontWeight: '400'
    lineHeight: '1.5'
  label-sm:
    fontFamily: Inter
    fontSize: 13px
    fontWeight: '600'
    lineHeight: '1'
    letterSpacing: 0.05em
rounded:
  sm: 0.25rem
  DEFAULT: 0.5rem
  md: 0.75rem
  lg: 1rem
  xl: 1.5rem
  full: 9999px
spacing:
  base: 8px
  container-padding: 32px
  gutter: 24px
  margin-mobile: 16px
  margin-desktop: 64px
---

## Brand & Style

This design system is defined by **Glassmorphism**, emphasizing depth, transparency, and the physical properties of light. It targets high-tech, creative, or premium SaaS platforms that want to evoke a sense of future-forward sophistication. 

The personality is **Minimalist yet Dynamic**. It achieves this by balancing vast whitespace with high-density visual effects like backdrop blurs and subtle "specular" highlights on component edges. The goal is to make the UI feel like a series of etched glass panes floating in a vibrant, atmospheric space.

The aesthetic relies on three key pillars:
1.  **Translucency:** Every container uses `backdrop-filter: blur()` to maintain context with the layers beneath.
2.  **Edge Definition:** Thin, low-opacity borders simulate the refraction of light at the edge of glass.
3.  **Vibrancy:** High-saturation accents provide functional "pops" of color that guide the eye through the transparent interface.

## Colors

The system uses a **Dual-Theme** approach, though it is optimized for Dark Mode where the glass effects are most evocative.

-   **Primary (Electric Blue):** Used for primary actions, active states, and focus indicators.
-   **Secondary (Vivid Purple):** Used for decorative elements, secondary highlights, and data visualization.
-   **Neutral:** A deep navy-black (`#0F172A`) serves as the canvas for dark mode, while a soft off-white (`#F8FAFC`) serves for light mode.
-   **Glass Logic:** Surfaces are not solid colors. They are semi-transparent hex codes with alpha channels. In Light Mode, surfaces lean toward a "frosted" white; in Dark Mode, they lean toward a "tinted" obsidian.

## Typography

The typography system pairs the geometric, wide-stanced **Sora** for headings with the highly legible, systematic **Inter** for body and UI labels.

-   **Headings:** Use Sora with tight letter spacing to create a high-fidelity, "tech" look. Display sizes should leverage the font's boldest weights to provide a heavy anchor for the otherwise airy, glass components.
-   **Body:** Inter provides a neutral, functional balance. It should always maintain a medium-to-high contrast against the blurred background to ensure accessibility.
-   **Labels:** Use all-caps with increased letter spacing for small UI labels, metadata, and category tags to mimic architectural blueprints.

## Layout & Spacing

The layout philosophy uses a **Fluid Grid with Generous Margins** to allow the background gradients and blurs to "breathe" around the components.

-   **Grid:** A 12-column grid is standard for desktop. Elements should favor wider spans to emphasize the glass surface area.
-   **Spacing:** An 8px base unit is used. However, component padding is intentionally spacious (minimum 24px for cards) to prevent the "etched" borders from feeling cramped.
-   **Adaptive Rules:** 
    -   **Mobile:** Margins shrink to 16px; glass blurs should be reduced in intensity (from 20px to 10px) to maintain performance on mobile GPUs.
    -   **Desktop:** Margins expand to 64px, creating a floating "island" effect for the main content area.

## Elevation & Depth

Elevation is not communicated through shadow alone, but through the **stacking of blurs and border opacity.**

-   **Level 0 (Background):** Vibrant, slow-moving mesh gradients.
-   **Level 1 (Default Surface):** 16px Backdrop Blur, 60% Opacity Surface, 1px Border (10% White).
-   **Level 2 (Floating/Hover):** 32px Backdrop Blur, 70% Opacity Surface, 1px Border (20% White), and a 20px soft ambient shadow with a tint of the background color.
-   **Level 3 (Modals/Popovers):** 40px Backdrop Blur, high-contrast border, and a "glow" effect—a primary-colored drop shadow with 0 spread and high blur radius.

Always use `box-shadow: inset` for a subtle inner highlight on the top and left edges to simulate light hitting the thickness of the glass.

## Shapes

The shape language is **Rounded and Organic**. 

-   **Cards and Containers:** Use `rounded-lg` (1rem / 16px) as the standard. This softness contrasts with the "hard" precision of the geometric typography.
-   **Interactive Elements:** Buttons and Input fields should match the container's roundedness or use `rounded-xl` for a more approachable feel.
-   **Visual Hierarchy:** Smaller elements (chips, tags) should use a slightly smaller radius than the parent container to maintain visual nesting harmony.

## Components

-   **Buttons:** Primary buttons use a solid-to-vibrant gradient. On hover, apply a `box-shadow` glow using the primary color. Secondary buttons are "Ghost Glass"—transparent with a 1px border that brightens on hover.
-   **Cards:** The flagship component. Must feature `backdrop-filter: blur(16px)`, a `1px` semi-transparent white border, and `overflow: hidden` to ensure the glass pane effect is clean.
-   **Input Fields:** Translucent dark backgrounds with a bottom-only border that transforms into a full-border glow upon focus.
-   **Navigation Bar:** A "Floating Dock" style bar. Fixed to the top or bottom with a high-intensity blur (`30px`) and a pill-shaped container.
-   **Chips:** Highly saturated, semi-transparent backgrounds (e.g., `primary-color` at 20% opacity) with matching text color for high readability.
-   **Progress Indicators:** Use glowing, neon-like lines that appear to be "inside" the glass pane.