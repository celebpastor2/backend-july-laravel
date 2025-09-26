<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Create Product</title>
  <style>
    /* Minimal, clean styling */
    :root{
      --bg:#f7f8fb; --card:#fff; --muted:#6b7280; --accent:#111827;
      --success:#10b981; --danger:#ef4444;
      font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }
    body{background:var(--bg); margin:0; padding:32px; color:var(--accent);}
    .container{max-width:900px; margin:0 auto;}
    .card{background:var(--card); border-radius:12px; padding:20px; box-shadow:0 6px 18px rgba(15,23,42,0.06);}
    h1{margin:0 0 10px; font-size:1.4rem;}
    form{display:grid; gap:14px;}
    .row{display:flex; gap:14px; flex-wrap:wrap;}
    label{display:block; font-size:.9rem; margin-bottom:6px;}
    input[type="text"], input[type="number"], input[type="file"], select, textarea {
      width:100%; padding:10px 12px; border:1px solid #e6e9ef; border-radius:8px; font-size:.95rem;
    }
    textarea{min-height:100px; resize:vertical;}
    .half{flex:1 1 240px;}
    .small{flex:0 0 120px;}
    .hint{font-size:.85rem; color:var(--muted);}
    .actions{display:flex; gap:10px; justify-content:flex-end; margin-top:6px;}
    button{padding:10px 14px; border-radius:8px; border:0; cursor:pointer; font-weight:600;}
    .btn-primary{background:#111827;color:#fff;}
    .btn-ghost{background:transparent;border:1px solid #e6e9ef;}
    .switch{display:inline-flex; align-items:center; gap:8px;}
    .image-previews{display:flex; gap:8px; flex-wrap:wrap; margin-top:8px;}
    .image-previews img{width:90px; height:90px; object-fit:cover; border-radius:6px; border:1px solid #e6e9ef;}
    .field-grid{display:grid; grid-template-columns:1fr 1fr; gap:14px;}
    .errors{color:var(--danger); font-size:.9rem;}
    @media (max-width:700px){ .field-grid{grid-template-columns:1fr} .row{flex-direction:column} }
  </style>
</head>
<body>
  <div class="container">
    <div class="card" role="region" aria-labelledby="create-product-heading">
      <h1 id="create-product-heading">Create Product</h1>
      <p class="hint">Fill out the product details below. Fields marked with * are required.</p>

      <form id="productForm" novalidate>
        <!-- Basic -->
        <div class="field-grid">
          <div>
            <label for="name">Product Name *</label>
            <input id="name" name="name" type="text" required minlength="2" maxlength="150" placeholder="e.g. Wireless Headphones" />
            <div class="hint">Keep the name short and descriptive.</div>
          </div>

          <div>
            <label for="sku">SKU / Model</label>
            <input id="sku" name="sku" type="text" maxlength="64" placeholder="e.g. WH-2025" />
            <div class="hint">Stock Keeping Unit (optional).</div>
          </div>
        </div>

        <div>
          <label for="description">Description *</label>
          <textarea id="description" name="description" required maxlength="2000" placeholder="Write a clear product description..."></textarea>
          <div class="hint">Up to 2000 characters. Highlight key features and benefits.</div>
        </div>

        <!-- Category, Tags, Attributes -->
        <div class="row">
          <div class="half">
            <label for="category">Category *</label>
            <select id="category" name="category" required>
              <option value="">— Select category —</option>
              <option>Electronics</option>
              <option>Apparel</option>
              <option>Home & Living</option>
              <option>Beauty</option>
              <option>Books</option>
              <option>Other</option>
            </select>
          </div>

          <div class="half">
            <label for="tags">Tags</label>
            <input id="tags" name="tags" type="text" placeholder="comma, separated, tags" />
            <div class="hint">Helpful for search — separate with commas (e.g. wireless, bluetooth).</div>
          </div>
        </div>

        <!-- Pricing & Inventory -->
        <div class="field-grid">
          <div>
            <label for="price">Price (USD) *</label>
            <input id="price" name="price" type="number" required min="0" step="0.01" placeholder="99.99" />
          </div>

          <div>
            <label for="salePrice">Sale Price</label>
            <input id="salePrice" name="salePrice" type="number" min="0" step="0.01" placeholder="79.99" />
            <div class="hint">Optional. Leave empty if not on sale.</div>
          </div>

          <div class="small">
            <label for="stock">Stock Qty *</label>
            <input id="stock" name="stock" type="number" required min="0" step="1" value="0" />
          </div>

          <div class="small">
            <label for="weight">Weight (kg)</label>
            <input id="weight" name="weight" type="number" min="0" step="0.01" placeholder="0.50" />
          </div>
        </div>

        <!-- Images -->
        <div>
          <label for="images">Product Images</label>
          <input id="images" name="images" type="file" accept="image/*" multiple />
          <div class="hint">You can upload multiple images. Max size handled on server. Recommended 800×800 px.</div>
          <div id="imagePreview" class="image-previews" aria-live="polite"></div>
        </div>

        <!-- Flags -->
        <div class="row" style="align-items:center;">
          <label class="switch" for="active">
            <input id="active" name="active" type="checkbox" checked />
            <span>Active / Visible</span>
          </label>

          <label class="switch" for="featured">
            <input id="featured" name="featured" type="checkbox" />
            <span>Featured</span>
          </label>
        </div>

        <!-- Hidden / Metadata (example of extra fields) -->
        <input type="hidden" name="created_by" value="<!-- set server-side -->" />

        <!-- Errors -->
        <div id="formErrors" class="errors" role="alert" aria-live="assertive" style="display:none;"></div>

        <!-- Actions -->
        <div class="actions">
          <button type="reset" class="btn-ghost">Reset</button>
          <button type="submit" class="btn-primary">Create Product</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    // Basic client-side JS: preview images and validate price logic (sale < price)
    (function(){
      const form = document.getElementById('productForm');
      const imagesInput = document.getElementById('images');
      const preview = document.getElementById('imagePreview');
      const formErrors = document.getElementById('formErrors');

      imagesInput.addEventListener('change', () => {
        preview.innerHTML = '';
        const files = Array.from(imagesInput.files).slice(0, 8); // limit preview to 8
        files.forEach(file => {
          if (!file.type.startsWith('image/')) return;
          const img = document.createElement('img');
          img.alt = file.name;
          preview.appendChild(img);
          const reader = new FileReader();
          reader.onload = e => img.src = e.target.result;
          reader.readAsDataURL(file);
        });
      });

      form.addEventListener('submit', (ev) => {
        ev.preventDefault();
        formErrors.style.display = 'none';
        formErrors.textContent = '';

        // Basic HTML5 validity
        if (!form.checkValidity()) {
          form.reportValidity();
          return;
        }

        // additional logic: sale price < price
        const price = parseFloat(document.getElementById('price').value || 0);
        const sale = parseFloat(document.getElementById('salePrice').value || 0);
        if (sale > 0 && sale >= price) {
          formErrors.style.display = '';
          formErrors.textContent = 'Sale price must be lower than regular price.';
          return;
        }

        // Prepare form data for sending to server (e.g., via fetch)
        const data = new FormData(form);
        // If using JSON API, transform as needed. Example below sends FormData:
        // fetch('/api/products', { method:'POST', body: data })
        //   .then(r => r.json()).then(resp => { /* handle success */ })
        //   .catch(err => { /* handle error */ });

        // For demo: show a console log and reset
        console.log('Form ready to send. FormData keys:');
        for (const pair of data.entries()) {
          console.log(pair[0], pair[1]);
        }
        alert('Product form passed client-side validation. Submit to server from here.');
      });
    })();
  </script>
</body>
</html>
