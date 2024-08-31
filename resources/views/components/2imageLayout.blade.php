<div>


    <div class="img-con2">
        <div class="clouds2 clouds2-top">
            <img src="/public/assets/img/cloud1.png" alt="">
            <img src="/public/assets/img/cloud3.png" alt="">
            <img src="/public/assets/img/cloud4.png" alt="">
        </div>

        <img src="/public/assets/img/img1.jpg" alt="">
        <img src="/public/assets/img/img1.jpg" alt="">

        <div class="clouds2 clouds2-bottom">
            <img src="/public/assets/img/cloud1.png" alt="">
            <img src="/public/assets/img/cloud3.png" alt="">
            <img src="/public/assets/img/cloud4.png" alt="">
        </div>
    </div>
</div>

<style>
    .img-con2 {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
    }

    .img-con2 img {
        border: 2px solid white;
        width: 100%;
        position: relative;
        z-index: 1;
    }

    .clouds2 {
        position: absolute;
        width: 100%;
        height: 100px;
        /* Adjust height as needed */
        z-index: 2;
    }

    .clouds img {
        position: absolute;
        width: 130%;
        border: none;
        left: 50%;
        transform: translateX(-50%);
    }

    .clouds2-top {
        top: 0;
    }

    .clouds2-top img {
        top: -50px;
        /* Adjust as needed */
        transform: translateX(-50%) rotate(180deg);
    }

    .clouds2-bottom {
        bottom: 0;
    }

    .clouds2-bottom img {
        bottom: -50px;
        /* Adjust as needed */
    }
</style>
