<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List | مدیریت تسک‌ها</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Vazirmatn Persian Font -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css">
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>
<style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --info: #4895ef;
            --warning: #f72585;
            --danger: #e63946;
            --light: #f8f9fa;
            --dark: #212529;
            --background: #f0f2f5;
            --card-bg: #ffffff;
            --text-primary: #333333;
            --text-secondary: #6c757d;
            --border-radius: 12px;
            --box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Vazirmatn', sans-serif;
            background-color: var(--background);
            color: var(--text-primary);
            padding-bottom: 2rem;
            line-height: 1.6;
        }

        .navbar-custom {
            background: linear-gradient(120deg, var(--primary), var(--secondary));
            box-shadow: var(--box-shadow);
        }

        .app-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
        }

        .card-custom {
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            border: none;
            transition: var(--transition);
        }

        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .card-header-custom {
            background: linear-gradient(120deg, var(--primary), var(--secondary));
            color: white;
            border-radius: var(--border-radius) var(--border-radius) 0 0 !important;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .todo-item {
            transition: var(--transition);
            border-radius: 8px;
        }

        .todo-item:hover {
            background-color: rgba(67, 97, 238, 0.05);
        }

        .btn-custom-primary {
            background: linear-gradient(to right, var(--primary), var(--info));
            color: white;
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(67, 97, 238, 0.3);
            transition: var(--transition);
        }

        .btn-custom-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(67, 97, 238, 0.4);
            color: white;
        }

        .btn-custom-outline {
            border: 1.5px solid var(--primary);
            color: var(--primary);
            background: transparent;
            border-radius: 8px;
            transition: var(--transition);
        }

        .btn-custom-outline:hover {
            background-color: var(--primary);
            color: white;
        }

        .btn-action {
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            font-size: 0.85rem;
        }

        .btn-show {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary);
        }

        .btn-show:hover {
            background-color: var(--primary);
            color: white;
        }

        .btn-complete {
            background-color: rgba(76, 201, 240, 0.1);
            color: var(--success);
        }

        .btn-complete:hover {
            background-color: var(--success);
            color: white;
        }

        .description-box {
            background-color: #f8f9fa;
            padding: 1.5rem;
            border-radius: var(--border-radius);
            border-right: 4px solid var(--primary);
            line-height: 1.8;
        }

        .pagination-custom .page-link {
            border-radius: 8px;
            margin: 0 0.25rem;
            color: var(--primary);
            transition: var(--transition);
        }

        .pagination-custom .page-link:hover {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
        }
    </style>
</head>
<body>



@yield('content')


<script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>