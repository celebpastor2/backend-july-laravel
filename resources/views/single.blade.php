<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Product Page</title>
  <style>
    :root{
      --bg:#f7f8fb; --card:#fff; --muted:#6b7280; --accent:#111827;
    }
    body{background:var(--bg); margin:0; padding:32px; color:var(--accent); font-family: Inter, system-ui, sans-serif;}
    .container{max-width:1000px; margin:0 auto;}
    .card{background:var(--card); border-radius:12px; padding:20px; box-shadow:0 6px 18px rgba(15,23,42,0.06);}
    h1{margin:0 0 10px; font-size:1.6rem;}
    .row{display:flex; gap:20px; flex-wrap:wrap;}
    .left{flex:1 1 380px;}
    .right{flex:1 1 380px; display:flex; flex-direction:column; gap:14px;}
    .gallery{display:flex; flex-direction:column; gap:10px;}
    .gallery img{width:100%; border-radius:10px; border:1px solid #e6e9ef; object-fit:cover;}
    .thumbnails{display:flex; gap:8px; margin-top:8px;}
    .thumbnails img{width:70px; height:70px; object-fit:cover; border:1px solid #e6e9ef; border-radius:6px; cursor:pointer;}
    .price{font-size:1.5rem; font-weight:700;}
    .sale-price{color:#ef4444; margin-right:10px;}
    .old-price{text-decoration:line-through; color:var(--muted); font-size:1rem;}
    .description{line-height:1.6; color:var(--accent);}
    .tags{margin-top:10px; display:flex; flex-wrap:wrap; gap:6px;}
    .tag{background:#f3f4f6; padding:4px 10px; border-radius:6px; font-size:.85rem; color:var(--muted);}
    button{padding:12px 16px; border-radius:8px; border:0; cursor:pointer; font-weight:600; font-size:1rem;}
    .btn-primary{background:#111827;color:#fff;}
    .btn-ghost{background:transparent;border:1px solid #e6e9ef;}
    @media(max-width:800px){.row{flex-direction:column;}}
  </style>
</head>
<body>
  <div class="container">
    <div class="card" role="main">
      <div class="row">
        <!-- Left: Image Gallery
        https://via.placeholder.com/800x600.png?text=Product+Main+Image 
        -->
        <div class="left">
          <div class="gallery">
            <img id="mainImage" src="{{$product->image}}" alt="Product Image">
            <div class="thumbnails">
              <img src="https://via.placeholder.com/150.png?text=Image+1" alt="Thumbnail 1" onclick="swapImage(this)">
              <img src="https://via.placeholder.com/150.png?text=Image+2" alt="Thumbnail 2" onclick="swapImage(this)">
              <img src="https://via.placeholder.com/150.png?text=Image+3" alt="Thumbnail 3" onclick="swapImage(this)">
            </div>
          </div>
        </div>

        <!-- Right: Product Info -->
        <div class="right">
          <h1>Wireless Headphones</h1>
          <div>
            <span class="price">
              <span class="sale-price">$79.99</span>
              <span class="old-price">$99.99</span>
            </span>
          </div>
          <div class="description">
            <p>Experience high-quality sound with our Wireless Headphones. Featuring noise cancellation, 30 hours of battery life, and a comfortable fit, they’re perfect for work, travel, or relaxing with your favorite music.</p>
          </div>
          <div class="tags">
            <span class="tag">Wireless</span>
            <span class="tag">Bluetooth</span>
            <span class="tag">Noise Cancelling</span>
          </div>
          <div>
            <button class="btn-primary">Add to Cart</button>
            <button class="btn-ghost">Add to Wishlist</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function swapImage(img){
      document.getElementById('mainImage').src = img.src;
    }
  </script>
</body>
</html>
