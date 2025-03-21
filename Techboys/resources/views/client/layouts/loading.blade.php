@extends('master')

@section('loading')
<style>
    #loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        visibility: hidden;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    #loading-overlay.active {
        visibility: visible;
        opacity: 1;
    }

    .loading-spinner {
        border: 4px solid rgba(0, 0, 0, 0.1);
        border-left-color: #007bff;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<div id="loading-overlay">
    <div class="loading-spinner"></div>
</div>

<script>
    window.addEventListener("pageshow", function (event) {
        if (event.persisted) {
            // Hiển thị loading
            let loadingOverlay = document.getElementById("loading-overlay");
            loadingOverlay.classList.add("active");

            // Reload trang sau một chút để người dùng thấy loading
            setTimeout(() => {
                location.reload();
            }, 500);
        }
    });
</script>

@endsection
