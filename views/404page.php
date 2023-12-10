<style>
    #main {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 70vh;
        text-align: center;
    }

    .flex {
        justify-content: center;
    }

    h1 {
        margin-bottom: 0;
        padding-right: 12px;
        border-right: 2px solid #ccc;
    }

    .fof p {
        font-size: 32px;
        display: inline-block;
        padding-right: 12px;
        padding-left: 12px;
        animation: type .5s alternate infinite;
    }

    .back {
        text-decoration: none;
        font-size: 18px;
        display: block;
        margin-top: 21px;
        font-weight: 600;
        transition: all .3s ease-in-out;
    }

    .back::after {
        content: '';
        display: block;
        width: 0;
        height: 2px;
        bottom: -8px;
        background: #000;
        transition: width .3s ease-in-out;
    }

    .back:hover::after {
        width: 100%;
    }

    @keyframes type {
        from {
            box-shadow: inset -3px 0px 0px #888;
        }

        to {
            box-shadow: inset -3px 0px 0px transparent;
        }    
    } 
</style>

<div id="main">
    <div class="flex">
        <div class="fo">
            <h1>Error 404</h1>
        </div>
        <div class="fof">
            <p id="errorMessage"></p>
        </div>
    </div>
    <a class="back" href="index.php">Quay Lại </a>
</div>

<script>
    const errorMessage = document.getElementById('errorMessage');
    let text = "Không Thể Tìm Thấy Trang Này";
    let index = 0;

    function typeText() {
        if (index < text.length) {
            errorMessage.innerHTML += text.charAt(index);
            index++;
            setTimeout(typeText, 50);
        }
    }

    typeText();
</script>