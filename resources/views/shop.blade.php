<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Shop Management — Static Template</title>
  <meta name="description" content="Static shop management dashboard template (products, orders, inventory, sales)." />
  <style>
    :root{
      --bg:#0f1724; --card:#0b1220; --muted:#9aa4b2; --accent:#4f46e5; --glass: rgba(255,255,255,0.04);
      --success:#10b981; --danger:#ef4444; --radius:12px; --pad:16px;
      color-scheme: dark;
    }
    *{box-sizing:border-box}
    html,body{height:100%;margin:0;font-family:Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;color:#e6eef6;background:linear-gradient(180deg,var(--bg),#071124);}
    a{color:inherit}
    .app{display:grid;grid-template-columns:260px 1fr;gap:20px;max-width:1200px;margin:28px auto;padding:20px}
    .sidebar{background:var(--card);border-radius:var(--radius);padding:18px;display:flex;flex-direction:column;gap:12px}
    .brand{display:flex;gap:10px;align-items:center}
    .logo{width:40px;height:40px;background:linear-gradient(135deg,var(--accent),#06b6d4);border-radius:10px;display:flex;align-items:center;justify-content:center;font-weight:700}
    .nav a{display:block;padding:10px;border-radius:8px;color:var(--muted);text-decoration:none}
    .nav a.active{background:var(--glass);color:#fff}
    .card{background:linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));padding:var(--pad);border-radius:12px}
    header{display:flex;justify-content:space-between;gap:12px;align-items:center}
    .search{flex:1;margin-left:18px}
    .topbar{display:flex;align-items:center;gap:12px}
    .main{display:flex;flex-direction:column;gap:18px}
    .kpi{display:flex;gap:12px}
    .kpi .item{flex:1}
    .grid-2{display:grid;grid-template-columns:1fr 420px;gap:12px}
    table{width:100%;border-collapse:collapse;font-size:14px}
    th,td{padding:10px;text-align:left;border-bottom:1px solid rgba(255,255,255,0.03)}
    th{color:var(--muted);font-size:13px}
    .btn{display:inline-block;padding:8px 12px;border-radius:8px;background:var(--accent);color:white;text-decoration:none}
    .btn.ghost{background:transparent;border:1px solid rgba(255,255,255,0.04);color:var(--muted)}
    .muted{color:var(--muted)}
    .badge{padding:6px 8px;border-radius:999px;font-size:12px}
    .status-instock{background:rgba(16,185,129,0.12);color:var(--success)}
    .status-low{background:rgba(245,158,11,0.12);color:#f59e0b}
    .status-out{background:rgba(239,68,68,0.12);color:var(--danger)}
    .products-list{max-height:360px;overflow:auto}
    /* modal */
    .modal{position:fixed;inset:0;display:none;align-items:center;justify-content:center;background:rgba(2,6,23,0.6);}
    .modal.open{display:flex}
    .modal .panel{width:560px;max-width:95%;}
    /* responsive */
    @media(max-width:900px){.app{grid-template-columns:1fr;padding:12px}.sidebar{display:none}.grid-2{grid-template-columns:1fr}.topbar .search{display:none}}
  </style>
</head>
<body>
  <div class="app">
    <aside class="sidebar card">
      <div class="brand">
        <div class="logo">SM</div>
        <div>
          <div style="font-weight:700">Shop Manager</div>
          <div class="muted" style="font-size:13px">Admin dashboard — static</div>
        </div>
      </div>
      <nav class="nav" style="margin-top:8px">
        <a href="#" class="active">Dashboard</a>
        <a href="#">Products</a>
        <a href="#">Orders</a>
        <a href="#">Inventory</a>
        <a href="#">Customers</a>
        <a href="#">Reports</a>
        <a href="#">Settings</a>
      </nav>
      <div style="margin-top:auto" class="muted">v1.0 — static template</div>
    </aside>

    <main class="main">
      <header class="card" style="display:flex;align-items:center">
        <div style="display:flex;align-items:center">
          <h2 style="margin:0">Dashboard</h2>
          <div class="muted" style="margin-left:12px">overview</div>
        </div>
        <div class="topbar" style="margin-left:auto">
          <div class="search card" style="display:flex;align-items:center;gap:8px;padding:8px 12px;max-width:420px">
            <input placeholder="Search products or orders..." style="width:100%;background:transparent;border:0;outline:none;color:inherit" />
            <button class="btn ghost">Search</button>
          </div>
          <button class="btn" id="addProductBtn">+ Add product</button>
        </div>
      </header>

      <section class="kpi">
        <div class="card item">
          <div style="display:flex;justify-content:space-between;align-items:center">
            <div>
              <div class="muted">Total Sales</div>
              <div style="font-size:20px;font-weight:700">$12,420</div>
            </div>
            <div class="muted">Last 30d</div>
          </div>
        </div>
        <div class="card item">
          <div style="display:flex;justify-content:space-between;align-items:center">
            <div>
              <div class="muted">Orders</div>
              <div style="font-size:20px;font-weight:700">128</div>
            </div>
            <div class="muted">Open</div>
          </div>
        </div>
        <div class="card item">
          <div style="display:flex;justify-content:space-between;align-items:center">
            <div>
              <div class="muted">Products</div>
              <div style="font-size:20px;font-weight:700">54</div>
            </div>
            <div class="muted">Active</div>
          </div>
        </div>
      </section>

      <section class="grid-2">
        <div class="card">
          <h3 style="margin-top:0">Recent Orders</h3>
          <div style="overflow:auto">
            <table>
              <thead><tr><th>Order</th><th>Customer</th><th>Amount</th><th>Status</th></tr></thead>
              <tbody>
                <tr><td>#1001</td><td>Jane D.</td><td>$98.00</td><td><span class="badge status-instock">Paid</span></td></tr>
                <tr><td>#1000</td><td>Mike L.</td><td>$45.50</td><td><span class="badge status-low">Processing</span></td></tr>
                <tr><td>#999</td><td>Acme Corp</td><td>$1,200.00</td><td><span class="badge status-instock">Paid</span></td></tr>
                <tr><td>#998</td><td>Sara K.</td><td>$12.00</td><td><span class="badge status-out">Refunded</span></td></tr>
              </tbody>
            </table>
          </div>
        </div>

        <aside class="card">
          <h3 style="margin-top:0">Sales (Last 7 days)</h3>
          <canvas id="salesChart" width="420" height="180" style="width:100%;height:160px"></canvas>
          <div style="display:flex;gap:8px;margin-top:12px;justify-content:space-between">
            <div class="muted">Avg order value: <strong>$97</strong></div>
            <div class="muted">Conversion: <strong>2.4%</strong></div>
          </div>
        </aside>
      </section>

      <section class="card">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px">
          <h3 style="margin:0">Products</h3>
          <div class="muted">Showing 1-10 of 54</div>
        </div>
        <div class="products-list">
          <table>
            <thead>
              <tr><th>Product</th><th>SKU</th><th>Price</th><th>Stock</th><th></th></tr>
            </thead>
            <tbody>
              <tr><td>Eco T-Shirt</td><td>TSH-001</td><td>$18.00</td><td><span class="badge status-instock">120</span></td><td><a class="btn ghost">Edit</a></td></tr>
              <tr><td>Ceramic Mug</td><td>MUG-021</td><td>$12.00</td><td><span class="badge status-low">8</span></td><td><a class="btn ghost">Edit</a></td></tr>
              <tr><td>Stainless Bottle</td><td>BOT-102</td><td>$22.00</td><td><span class="badge status-instock">64</span></td><td><a class="btn ghost">Edit</a></td></tr>
              <tr><td>Sticker Pack</td><td>STK-300</td><td>$5.00</td><td><span class="badge status-out">0</span></td><td><a class="btn ghost">Edit</a></td></tr>
            </tbody>
          </table>
        </div>
      </section>

      <footer style="text-align:center;color:var(--muted);font-size:13px;padding:12px">Static template • Customize as needed</footer>
    </main>
  </div>

  <!-- Add product modal (static) -->
  <div class="modal" id="modal">
    <div class="panel card">
      <h3 style="margin-top:0">Add product</h3>
      <form id="productForm">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px">
          <input placeholder="Product name" required style="padding:10px;border-radius:8px;border:0;background:rgba(255,255,255,0.02);color:inherit" />
          <input placeholder="SKU" required style="padding:10px;border-radius:8px;border:0;background:rgba(255,255,255,0.02);color:inherit" />
        </div>
        <div style="display:flex;gap:8px;margin-top:8px">
          <input placeholder="Price" required style="padding:10px;border-radius:8px;border:0;background:rgba(255,255,255,0.02);color:inherit;flex:1" />
          <input placeholder="Stock" required style="padding:10px;border-radius:8px;border:0;background:rgba(255,255,255,0.02);color:inherit;width:120px" />
        </div>
        <div style="display:flex;gap:8px;margin-top:12px;justify-content:flex-end">
          <button type="button" class="btn ghost" id="closeModal">Cancel</button>
          <button class="btn" type="submit">Save product</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    // modal toggle
    const modal = document.getElementById('modal');
    document.getElementById('addProductBtn').addEventListener('click', ()=> modal.classList.add('open'));
    document.getElementById('closeModal').addEventListener('click', ()=> modal.classList.remove('open'));
    modal.addEventListener('click', (e)=>{ if(e.target===modal) modal.classList.remove('open') });
    document.getElementById('productForm').addEventListener('submit', (e)=>{
      e.preventDefault();
      alert('This is a static template — implement saving logic in your backend.');
      modal.classList.remove('open');
    });

    // tiny sales sparkline (vanilla canvas)
    (function draw(){
      const canvas = document.getElementById('salesChart');
      const ctx = canvas.getContext('2d');
      const data = [10,18,12,22,30,24,20]; // sample points
      const w = canvas.width; const h = canvas.height; ctx.clearRect(0,0,w,h);
      const pad = 18; const max = Math.max(...data); const min = Math.min(...data);
      ctx.lineWidth = 2; ctx.strokeStyle = '#7c5cff'; ctx.beginPath();
      data.forEach((v,i)=>{
        const x = pad + i*((w-2*pad)/(data.length-1));
        const y = h - pad - ((v-min)/(max-min))*(h-2*pad);
        if(i===0) ctx.moveTo(x,y); else ctx.lineTo(x,y);
      });
      ctx.stroke();
      // fill gradient
      const grad = ctx.createLinearGradient(0,0,0,h); grad.addColorStop(0,'rgba(124,92,255,0.18)'); grad.addColorStop(1,'rgba(124,92,255,0.02)');
      ctx.lineTo(w-pad,h-pad); ctx.lineTo(pad,h-pad); ctx.closePath(); ctx.fillStyle = grad; ctx.fill();
    })();
  </script>
</body>
</html>
