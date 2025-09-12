<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>@yield("title", "Modern Site Layout") </title>
  <meta name="description" content="@yield( 'description','Modern, responsive site layout — hero, features, CTA, contact and footer.')" />

  <!-- Optional: Google Font -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="home.css">
</head>
<body>
  <div class="container">
    <header class="header" role="banner" aria-label="Site header">
      <a href="#" class="brand" aria-label="Homepage">
        <div class="logo">MS</div>
        <div>
          <div style="font-weight:800">@yield("site-title","ModernSite")</div>
          <div style="font-size:.8rem;color:var(--muted)">Clean UI & components</div>
        </div>
      </a>

      <nav class="desktop" role="navigation" aria-label="Primary">
        <a href="#features">Features</a>
        <a href="#pricing">Pricing</a>
        <a href="#contact">Contact</a>
        <a href="#signup" class="cta">Get Started</a>
        <button class="mobile-toggle" id="themeToggle" aria-label="Toggle theme">🌙</button>
      </nav>

      <!-- mobile -->
      <div style="display:flex;align-items:center;gap:.5rem">
        <button class="mobile-toggle" id="mobileToggle" aria-expanded="false" aria-controls="mobileMenu" aria-label="Toggle menu">
          ☰
        </button>
      </div>
    </header>

    <div id="mobileMenu" class="mobile-menu" hidden>
      <a href="#features">Features</a>
      <a href="#pricing">Pricing</a>
      <a href="#contact">Contact</a>
      <a href="#signup" class="cta">Get Started</a>
      <div style="margin-top:.5rem">
        <button class="mobile-toggle" id="themeToggleMobile" aria-label="Toggle theme">🌙 Theme</button>
      </div>
    </div>

    <!-- HERO -->
    <section class="hero" aria-labelledby="hero-heading">
      <div>
        <div class="eyebrow">Launch faster · Build better</div>
        <h1 id="hero-heading">A modern site layout — built for speed and clarity.</h1>
        <p>Responsive, accessible components and layout patterns you can reuse across projects. Lightweight, framework-agnostic, and easy to customize.</p>

        <div class="hero-cta">
          <button class="btn primary" onclick="location.href='#signup'">Start free trial</button>
          <button class="btn ghost" onclick="location.href='#features'">See features</button>
          <span class="pill">No credit card • 14-day trial</span>
        </div>

        <div style="margin-top:1rem" class="muted">Trusted by designers & developers — example company logos could go here.</div>
      </div>

      <aside class="card">
        <div style="display:flex;flex-direction:column;gap:.75rem">
          <div style="display:flex;align-items:center;justify-content:space-between">
            <div>
              <div style="font-weight:700">Your dashboard</div>
              <div class="muted" style="font-size:.9rem">Overview · Stats · Activity</div>
            </div>
            <div class="pill">Beta</div>
          </div>

          <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:.5rem;padding-top:.5rem">
            <div style="background:var(--glass);padding:.6rem;border-radius:8px;text-align:center">
              <div style="font-weight:800">1.2k</div>
              <div class="muted" style="font-size:.85rem">Users</div>
            </div>
            <div style="background:var(--glass);padding:.6rem;border-radius:8px;text-align:center">
              <div style="font-weight:800">98%</div>
              <div class="muted" style="font-size:.85rem">Uptime</div>
            </div>
          </div>

          <div style="margin-top:.75rem">
            <small class="muted">Recent activity</small>
            <ul style="margin:.5rem 0 0;padding-left:1rem;color:var(--muted)">               
              <li>Deploy completed — 2 hours ago</li>
              <li>New user signups — 46 today</li>
              @yield("add-list")
            </ul>
          </div>
        </div>
      </aside>
    </section>

    <!-- FEATURES -->
    <section id="features" class="features" aria-labelledby="features-heading">
      <h2 id="features-heading" style="grid-column:1/-1;margin:0">Features</h2>

      <div class="feature-grid" style="grid-column:1/-1">
        <article class="card">
          <h3>Responsive from the start</h3>
          <p class="muted">Layouts that adapt to any screen using CSS Grid & Flexbox.</p>
        </article>

        <article class="card">
          <h3>Accessible components</h3>
          <p class="muted">Keyboard-friendly, semantic HTML and visible focus states.</p>
        </article>

        <article class="card">
          <h3>Dark mode</h3>
          <p class="muted">Built-in theme toggle with preference persistence.</p>
        </article>

        <article class="card">
          <h3>Reusable cards & grids</h3>
          <p class="muted">Simple utility classes and components you can copy into your project.</p>
        </article>

        <article class="card">
          <h3>Clean typography</h3>
          <p class="muted">Inter font with sensible sizes and rhythm for reading.</p>
        </article>

        <article class="card">
          <h3>Lightweight</h3>
          <p class="muted">No JS frameworks required — small, focused scripts only where needed.</p>
        </article>
      </div>
    </section>

    <!-- TWO-COLUMN EXAMPLE -->
    <section style="margin-top:1.25rem" class="two-col" aria-label="Two column example">
      <div class="card">
        <h3>Design system starter</h3>
        <p class="muted">Use this scaffold as the basis for a design system — tokens, components, patterns.</p>
        <ul style="margin-top:.6rem;color:var(--muted)">
          <li>Color & spacing tokens</li>
          <li>Buttons, forms, cards</li>
          <li>Layout primitives</li>
        </ul>
      </div>
      <div class="media card">
        Illustration / media placeholder
      </div>
    </section>

    <!-- CTA / Signup -->
    <section id="signup" style="margin-top:1.5rem;padding:1rem;border-radius:12px;background:linear-gradient(180deg, rgba(37,99,235,0.06), transparent)">
      <div style="display:flex;flex-direction:column;gap:.75rem">
        <div style="display:flex;align-items:center;justify-content:space-between;gap:1rem;flex-wrap:wrap">
          <div>
            <div style="font-weight:700">Ready to get started?</div>
            <div class="muted">Create an account and start building faster.</div>
          </div>
          <div style="display:flex;gap:.5rem;align-items:center">
            <button class="btn primary" onclick="location.href='#contact'">Create account</button>
            <button class="btn ghost" onclick="location.href='#features'">Learn more</button>
          </div>
        </div>
      </div>
    </section>

    <!-- CONTACT FORM -->
    <section id="contact" style="margin-top:1.5rem">
      <h2>Contact</h2>
      <div class="card" style="margin-top:.75rem">
        <form onsubmit="handleContact(event)">
          <div class="row">
            <label class="muted" for="name">Name</label>
            <input id="name" name="name" required placeholder="Your name">
          </div>

          <div class="row">
            <label class="muted" for="email">Email</label>
            <input id="email" type="email" name="email" required placeholder="you@example.com">
          </div>

          <div class="row">
            <label class="muted" for="message">Message</label>
            <textarea id="message" name="message" placeholder="Tell us a little about your project"></textarea>
          </div>

          <div style="display:flex;gap:.6rem;align-items:center">
            <button type="submit" class="btn primary">Send message</button>
            <div id="contactStatus" class="muted" aria-live="polite"></div>
          </div>
        </form>
      </div>
    </section>

    <!-- FOOTER -->
    <footer aria-label="Footer">
      <div class="footer-grid">
        <div>
          <div style="font-weight:800">ModernSite</div>
          <div class="muted">Built with ❤️ — use it, fork it, improve it.</div>
        </div>

        <div>
          <strong>Resources</strong>
          <ul style="margin:0;padding-left:1rem;color:var(--muted);margin-top:.5rem">
            <li><a href="#features">Features</a></li>
            <li><a href="#signup">Get Started</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>

        <div>
          <strong>Company</strong>
          <ul style="margin:0;padding-left:1rem;color:var(--muted);margin-top:.5rem">
            <li><a href="#">Terms</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Careers</a></li>
          </ul>
        </div>
      </div>

      <div style="margin-top:1rem" class="muted">© <span id="year"></span> ModernSite — All rights reserved.</div>
    </footer>
  </div>

  <script>
    // Year
    document.getElementById('year').textContent = new Date().getFullYear();

    // Mobile menu toggle
    const mobileToggle = document.getElementById('mobileToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    if (mobileToggle){
      mobileToggle.addEventListener('click', () => {
        const expanded = mobileToggle.getAttribute('aria-expanded') === 'true';
        mobileToggle.setAttribute('aria-expanded', String(!expanded));
        if (mobileMenu.hidden){
          mobileMenu.hidden = false;
          mobileToggle.textContent = '✕';
        } else {
          mobileMenu.hidden = true;
          mobileToggle.textContent = '☰';
        }
      });
    }

    // Theme toggle with persistence
    const themeToggle = document.getElementById('themeToggle');
    const themeToggleMobile = document.getElementById('themeToggleMobile');

    function setTheme(theme){
      if (theme === 'dark') {
        document.documentElement.setAttribute('data-theme','dark');
        if (themeToggle) themeToggle.textContent = '☀️';
        if (themeToggleMobile) themeToggleMobile.textContent = '☀️ Theme';
      } else {
        document.documentElement.removeAttribute('data-theme');
        if (themeToggle) themeToggle.textContent = '🌙';
        if (themeToggleMobile) themeToggleMobile.textContent = '🌙 Theme';
      }
    }

    // initialize theme (prefers-color-scheme fallback)
    const saved = localStorage.getItem('site-theme');
    if (saved) setTheme(saved);
    else {
      const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
      setTheme(prefersDark ? 'dark' : 'light');
    }

    if (themeToggle) themeToggle.addEventListener('click', () => {
      const active = document.documentElement.getAttribute('data-theme') === 'dark';
      const newTheme = active ? 'light' : 'dark';
      setTheme(newTheme);
      localStorage.setItem('site-theme', newTheme);
    });
    if (themeToggleMobile) themeToggleMobile.addEventListener('click', () => {
      const active = document.documentElement.getAttribute('data-theme') === 'dark';
      const newTheme = active ? 'light' : 'dark';
      setTheme(newTheme);
      localStorage.setItem('site-theme', newTheme);
    });

    // Example contact handler (replace with real integration)
    function handleContact(e){
      e.preventDefault();
      const status = document.getElementById('contactStatus');
      status.textContent = 'Sending...';

      // Fake async send: simulate success
      setTimeout(() => {
        status.textContent = 'Thanks — message received!';
        e.target.reset();
      }, 900);
    }
  </script>
</body>
</html>
