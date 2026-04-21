<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Dashboard')</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    @font-face {
        font-family: 'Regular';
        src: url('{{ asset('fonts/fancyfont.ttf') }}') format('truetype');
    }
    @font-face {
        font-family: 'Bold';
        src: url('{{ asset('fonts/fancyfontBold.ttf') }}') format('truetype');
    }
    @font-face {
        font-family: 'ExtraBold';
        src: url('{{ asset('fonts/fancyfontExtraBold.ttf') }}') format('truetype');
    }
    @font-face {
        font-family: 'Medium';
        src: url('{{ asset('fonts/fancyfontMedium.ttf') }}') format('truetype');
    }

    body {
      overflow-x: hidden;
      background: linear-gradient(135deg, #F9EAE6, #E8D3CF);
    }
    .content {
      margin-left: 250px;
      padding: 20px;
    }

    .sidebar {
      background-color: #D4BFBB; /* dark blue-gray background */
      color: #fff;
      width: 250px;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      padding: 1rem;
      overflow-y: auto;
    }

    .sidebar h4 {
      font-family: 'Medium', sans-serif;
      font-weight: bold;
      color: #4B3D3D;
      margin-bottom: 2rem;
    }

    .sidebar .nav-link {
      font-family: 'Medium', sans-serif;
      color: #4B3D3D;
      font-size: 16px;
      transition: all 0.2s;
      display: flex;
      align-items: center;
      gap: 8px;
      background-color: rgba(255, 255, 255, 0.25);
      border-radius: 8px;
      margin-bottom: 6px;
      padding: 8px 10px;
    }

    .sidebar .nav-link:hover {
      font-family: 'Bold', sans-serif;
      color: #4B3D3D;
      background-color: #B09796;
      border-radius: 5px;
    }

    .sidebar .nav-link.fw-bold {
      color: #4B3D3D;
      font-family: 'Bold', sans-serif;
    }

    .sidebar .collapse .nav-link {
      padding-left: 1.5rem;
    }

    .sidebar .nav-item .bi-chevron-down {
      transition: transform 0.3s ease;
    }

    .sidebar .nav-item .collapsed .bi-chevron-down {
      transform: rotate(0deg);
    }

    .sidebar .nav-item[aria-expanded="true"] .bi-chevron-down {
      transform: rotate(180deg);
    }

    .sidebar .nav-link.active {
      background-color: #4B3D3D;
      color: #ffffff !important;
      border-radius: 5px;
    }

    .dropdown-menu {
      background-color: #D4BFBB;
      border: none;
      border-radius: 10px;
      font-family: 'Regular', sans-serif;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .dropdown-item:hover {
      background-color: #B09796;
      font-family: 'Bold', sans-serif;
    }
  </style>
</head>
<body>

  @include('partials.sidebar')

  <div class="main-content">
    @include('partials.navbar')

    <div class="content">
      @yield('content')
    </div>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>