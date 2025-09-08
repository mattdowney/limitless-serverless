// This file controls how Tailwind processes your CSS. For details, see
// https://tailwindcss.com/docs/configuration

module.exports = {
  //
  // WARNING: By default, CodeKit automatically populates the `content` array with all entries from [Project Settings > PurgeCSS]
  // in CodeKit's UI. If you add ANY entries to the `content` array here, CodeKit will not auto-populate the array; it becomes your
  // responsibility to include every type of file in your project that uses CSS rules. It is preferable to edit the PurgeCSS content
  // list in CodeKit's UI.
  //
  // WARNING: DO NOT delete `content` or comment it out. If you do, CodeKit will treat this as a Tailwind 2.x project instead of 3.x.
  //
  content: ['./**/*.php', './template-parts/**/*.php', './js/**/*.js', './css/**/*.css'],

  //
  // All other TailwindCSS options are 100% under your control. Edit this config file as shown in the Tailwind Docs
  // to enable the settings or customizations you need.
  //
  theme: {
    screens: {
      xs: '360px',
      sm: '540px',
      md: '768px',
      lg: '1200px',
      xl: '1440px',
      '2xl': '1600px',
      '3xl': '1920px',
      '4xl': '2560px',
    },

    colors: {
      white: '#FFFFFF',
      black: '#0E001A',
      blue: '#0009FF',
      pink: '#FF1078',
      yellow: '#FFB13D',
      green: '#00F0AB',
      purple: '#9709E4',
      gray: '#D1CAF1',
    },

    fontFamily: {
      regular: [
        'Silka Regular',
        'Frutiger',
        'Frutiger Linotype',
        'Univers',
        'Calibri',
        'Gill Sans',
        'Gill Sans MT',
        'Myriad Pro',
        'Myriad',
        'DejaVu Sans Condensed',
        'Liberation Sans',
        'Nimbus Sans L',
        'Tahoma',
        'Geneva',
        'Helvetica Neue',
        'Helvetica',
        'Arial',
        'sans-serif',
      ],
      medium: [
        'Silka Medium',
        'Frutiger',
        'Frutiger Linotype',
        'Univers',
        'Calibri',
        'Gill Sans',
        'Gill Sans MT',
        'Myriad Pro',
        'Myriad',
        'DejaVu Sans Condensed',
        'Liberation Sans',
        'Nimbus Sans L',
        'Tahoma',
        'Geneva',
        'Helvetica Neue',
        'Helvetica',
        'Arial',
        'sans-serif',
      ],
      semibold: [
        'Silka Semibold',
        'Frutiger',
        'Frutiger Linotype',
        'Univers',
        'Calibri',
        'Gill Sans',
        'Gill Sans MT',
        'Myriad Pro',
        'Myriad',
        'DejaVu Sans Condensed',
        'Liberation Sans',
        'Nimbus Sans L',
        'Tahoma',
        'Geneva',
        'Helvetica Neue',
        'Helvetica',
        'Arial',
        'sans-serif',
      ],
      italic: [
        'Zilla Slab',
        'Frutiger',
        'Frutiger Linotype',
        'Univers',
        'Calibri',
        'Gill Sans',
        'Gill Sans MT',
        'Myriad Pro',
        'Myriad',
        'DejaVu Sans Condensed',
        'Liberation Sans',
        'Nimbus Sans L',
        'Tahoma',
        'Geneva',
        'Helvetica Neue',
        'Helvetica',
        'Arial',
        'sans-serif',
      ],
    },

    letterSpacing: {
      tightest: '-.075rem',
      tighter: '-.05rem',
      tight: '-.025rem',
      normal: '0',
      wide: '.025rem',
      wider: '.05rem',
      widest: '.075rem',
    },

    fontSize: {
      tiny: '0.75rem',
      xs: '0.95rem',
      sm: '1.075rem',
      md: '1.125rem',
      lg: '1.25rem',
      xl: '1.75rem',
      '2xl': '1.875rem',
      '3xl': '2.125rem',
      '4xl': '2.525rem',
      '5xl': '3.25rem',
    },

    backgroundSize: {
      auto: 'auto',
      cover: 'cover',
      contain: 'contain',
      '50%': '50%',
      '100%': '100%',
      '200%': '200%',
    },

    borderWidth: {
      DEFAULT: '2px',
      0: '0',
      1: '1px',
      2: '2px',
      3: '3px',
      4: '4px',
      6: '6px',
      8: '8px',
      10: '10px',
    },

    borderRadius: {
      none: '0',
      sm: '0.25rem',
      DEFAULT: '0.75rem',
      md: '0.5rem',
      lg: '1rem',
    },

    backgroundImage: {},

    extend: {
      display: ['group-hover'],

      //maxWidth: {
      //container: "1440px", // Check your Tailwind configuration to match the container max-width
      //},
    },
  },

  variants: {
    fill: ['hover', 'focus'],
  },

  //
  // If you want to run any Tailwind plugins (such as 'tailwindcss-typography'), simply install those into the Project via the
  // Packages area in CodeKit, then pass their names (and, optionally, any configuration values) here.
  // Full file paths are not necessary; CodeKit will find them.
  //
  plugins: [],
};
