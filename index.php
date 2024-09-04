<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thu & Cường</title>

    <link rel="shortcut icon" href="./assets/imgs/favicon.png" type="image/x-icon">
        
    <!-- CSS icon from Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">

    <link rel="stylesheet" href="./assets/css/calender.css">
    <link rel="stylesheet" href="./assets/css/notify.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>
    <!-- Background image -->
    <div class="background"></div>

    <!--  Animation loading  -->
    <div class="loading">
        <div class="loading__icon"></div>
    </div>

    <!-- Pop up to show notifications -->
    <div id="notify">
        <div class="d-flex align-items-center">
            <div class="notify-status d-flex justify-content-center align-items-center px-3 px-md-4 fs-1">
                <i class="fa-solid fa-circle-check"></i>
                <i class="fa-solid fa-bug"></i>
                <i class="fa-solid fa-triangle-exclamation"></i>
                <i class="fa-regular fa-comment-dots"></i>
            </div>

            <div class="notify-content">
                <div id="notify-title"></div>
                <div id="notify-message"></div>
            </div>

            <div id="notify-close-button" class="justify-content-center align-items-center px-2 px-md-3 fs-3">
                <i class="w-75 p-3 text-secondary fa-solid fa-xmark"></i>
            </div>
        </div>

        <div class="w-100 py-3 pe-4 justify-content-end notify-response" id="notify-response">
            <button class="ok me-2 fw-bold" id="ok">Ok</button>
            <button class="cancel fw-bold" id="cancel">Hủy</button>
        </div>
    </div>

    <div class="container">
        <header>
            <nav>
                <div class="nav-box navbar navbar-expand-md py-md-3">
                    <button class="ms-auto navbar-toggler" type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#header-navbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
            
                    <div class="collapse navbar-collapse" id="header-navbar">
                        <ul class="custom-navbar-link navbar-nav ms-auto mt-2 mt-md-0">
                            <li class="my-2 my-md-0 mt-md-0 me-2 me-lg-4 active">
                                <a href="#event" class="nav-item text-uppercase">Sự kiện cưới</a>
                            </li>
                            <li class="my-2 my-md-0 mt-md-0 me-2 me-lg-4">                
                                <a href="#album" class="nav-item text-uppercase">Hình cưới</a>
                            </li>
                            <li class="my-2 my-md-0 mt-md-0 me-2 me-lg-4">                
                                <a href="#gift" class="nav-item text-uppercase">Mừng cưới</a>
                            </li>
                            <li class="my-2 my-md-0 mt-md-0 me-2 me-lg-4">                
                                <a href="#wish" class="nav-item text-uppercase">Gửi lời chúc</a>
                            </li>
                            <li class="my-2 my-md-0 mt-md-0 me-2 me-lg-4">                
                                <a href="#attend" class="nav-item text-uppercase">Tham dự</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="title py-5 row flex-column align-items-end">
                <div class="col-12 col-md-9">
                    <div class="row w-100 align-items-center justify-content-end">
                        <div class="first-text"><div>Chúng tớ</div></div>
                        <div class="number">
                            <div class="day">08</div>
                            <div class="month">09</div>
                        </div>
                        <div class="second-text"><div>sắp kết hôn</div></div>
                    </div>
                </div>
            </div>

            <div class="frontground">
                <img data-position="banner" src="" id="banner-image" alt="Thu and Cuong">
                <h1 class="wedding-title">Wedding</h1>
                <h5 class="wedding-member">Thu Đàm & Cường Trần</h5>
            </div>
        </header>

        <main>
            <h2 class="calendar-title">Save the date</h2>
            <div class="calendar">
                <div class="header">
                    <h1 class="header_title pb-3">Tháng 09</h1>
                </div>
                <div class="days-of-week">
                    <div class="day-name"><div>Thứ 2</div></div>
                    <div class="day-name"><div>Thứ 3</div></div>
                    <div class="day-name"><div>Thứ 4</div></div>
                    <div class="day-name"><div>Thứ 5</div></div>
                    <div class="day-name"><div>Thứ 6</div></div>
                    <div class="day-name"><div>Thứ 7</div></div>
                    <div class="day-name"><div>CN</div></div>
                </div>
                <div class="days">
                    <div class="day-number day-number_disabled"><div></div></div>
                    <div class="day-number day-number_disabled"><div></div></div>
                    <div class="day-number day-number_disabled"><div></div></div>
                    <div class="day-number day-number_disabled"><div></div></div>
                    <div class="day-number day-number_disabled"><div></div></div>
                    <div class="day-number day-number_disabled"><div></div></div>
                    <div class="day-number"><div>1</div></div>
                    <div class="day-number"><div>2</div></div>
                    <div class="day-number"><div>3</div></div>
                    <div class="day-number"><div>4</div></div>
                    <div class="day-number"><div>5</div></div>
                    <div class="day-number"><div>6</div></div>
                    <div class="day-number"><div>7</div></div>
                    <div class="day-number active"><div>8</div></div>
                    <div class="day-number"><div>9</div></div>
                    <div class="day-number"><div>10</div></div>
                    <div class="day-number"><div>11</div></div>
                    <div class="day-number"><div>12</div></div>
                    <div class="day-number"><div>13</div></div>
                    <div class="day-number"><div>14</div></div>
                    <div class="day-number"><div>15</div></div>
                    <div class="day-number"><div>16</div></div>
                    <div class="day-number"><div>17</div></div>
                    <div class="day-number"><div>18</div></div>
                    <div class="day-number"><div>19</div></div>
                    <div class="day-number"><div>20</div></div>
                    <div class="day-number"><div>21</div></div>
                    <div class="day-number"><div>22</div></div>
                    <div class="day-number"><div>23</div></div>
                    <div class="day-number"><div>24</div></div>
                    <div class="day-number"><div>25</div></div>
                    <div class="day-number"><div>26</div></div>
                    <div class="day-number"><div>27</div></div>
                    <div class="day-number"><div>28</div></div>
                    <div class="day-number"><div>29</div></div>
                    <div class="day-number"><div>30</div></div>
                </div>
            </div>

            <div class="countdown mt-5">
                <div class="time">
                    <span id="days">00</span>
                    <div class="label">Ngày</div>
                </div>
                <div class="time">
                    <span id="hours">00</span>
                    <div class="label">Giờ</div>
                </div>
                <div class="time">
                    <span id="minutes">00</span>
                    <div class="label">Phút</div>
                </div>
                <div class="time">
                    <span id="seconds">00</span>
                    <div class="label">Giây</div>
                </div>
            </div>

            <div class="event pt-5 mt-5" id="event">
                <div class="heading">Sự kiện cưới</div>

                <div class="row justify-content-center">
                    <div class="event-item col-12 col-sm-6">
                        <div class="pb-3">
                            <h5 class="w-100 text-center text-uppercase title">Lễ hỏi nhà trai</h5>
                            <img class="event-image" data-position="groom-1" src="" alt="img">
            
                            <p class="date">08H 04/09/2024</p>
                            <p class="place">Tư gia, thôn Mão Xuyên, xã Nguyễn Trãi, huyện Ân Thi, Hưng Yên</p>
                        </div>
                    </div>
                    <div class="event-item col-12 col-sm-6">
                        <div class="pb-3">
                            <h5 class="w-100 text-center text-uppercase title">Lễ hỏi nhà gái</h5>
                            <img class="event-image" data-position="bride-1" src="" alt="img">

                            <p class="date">10H 04/09/2024</p>
                            <p class="place">Tư gia, thôn Đoan Xuyên, xã Ứng Hoè, huyện Ninh Giang, Hải Dương</p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center mt-md-4">
                    <div class="event-item col-12 col-sm-6">
                        <div class="pb-3">
                            <h5 class="w-100 text-center text-uppercase title">Lễ cưới nhà trai</h5>
                            <img class="event-image" data-position="groom-2" src="" alt="img">
            
                            <p class="date">10H 08/09/2024</p>
                            <p class="place">Tư gia, thôn Mão Xuyên, xã Nguyễn Trãi, huyện Ân Thi, Hưng Yên</p>
                        </div>
                    </div>
                    <div class="event-item col-12 col-sm-6">
                        <div class="pb-3">
                            <h5 class="w-100 text-center text-uppercase title">Lễ cưới nhà gái</h5>
                            <img class="event-image" data-position="bride-2" src="" alt="img">

                            <p class="date">17h 07/09/2024</p>
                            <p class="place">Tư gia, thôn Đoan Xuyên, xã Ứng Hoè, huyện Ninh Giang, Hải Dương</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="album pt-5" id="album">
                <div class="album-head pt-5">
                    <div class="row">
                        <div class="col-3 pe-0 pe-md-3 mb-1 mb-sm-2"><h4>Xem ảnh cùng chúng tớ nào</h4></div>
                        <div class="col-9">
                            <img data-position="album-top" class="rounded-0" src="" id="album-top-image" alt="img">
                        </div>
                    </div>
                </div>

                <div class="album-item mt-5">
                    <div class="d-flex justify-content-center">
                        <div class="col-4 pe-1 pe-sm-2 pb-4 pb-md-5">
                            <img style="aspect-ratio: 6/11;" class="album-col-image w-100 h-100" src="" alt="img">
                        </div>
                        <div class="col-4 px-sm-1 pt-4 pt-md-5" style="padding-left: 2px; padding-right: 2px;">
                            <img style="aspect-ratio: 6/11;" class="album-col-image w-100 h-100" src="" alt="img">
                        </div>
                        <div class="col-4 ps-1 ps-sm-2 pb-4 pb-md-5">
                            <img style="aspect-ratio: 6/11;" class="album-col-image w-100 h-100" src="" alt="img">
                        </div>
                    </div>
                </div>

                <div class="album-item mt-5">
                    <div class="row justify-content-center flex-colum align-items-center">
                        <div class="col-6 pe-1 pe-sm-2">
                            <img class="album-uneven-image my-1 my-sm-2" src="" alt="img">
                            <img class="album-uneven-image my-1 my-sm-2" src="" alt="img">
                        </div>
                        <div class="col-6 ps-1 ps-sm-2">
                            <img class="album-uneven-image my-1 my-sm-2" src="" alt="img">
                            <img class="album-uneven-image my-1 my-sm-2" src="" alt="img">
                            <img class="album-uneven-image my-1 my-sm-2" src="" alt="img">
                        </div>
                    </div>
                </div>

                <div class="album-item mt-5">
                    <div class="row">
                        <div class="col-12">
                            <img src="" class="rounded-0" style="aspect-ratio: 3/4;" id="album-center-image" alt="img">
                        </div>
                    </div>
                </div>

                <div class="album-item my-5">
                    <div class="row">
                        <div class="col-6 pe-1 pe-sm-2">
                            <img src="" class="album-grid-image py-1 py-sm-2 rounded-0" alt="img">
                            <img src="" class="album-grid-image py-1 py-sm-2 rounded-0" alt="img">
                            <img src="" class="album-grid-image py-1 py-sm-2 rounded-0" alt="img">
                            <img src="" class="album-grid-image py-1 py-sm-2 rounded-0" alt="img">
                        </div>
                        <div class="col-6 ps-1 ps-sm-2">
                            <img src="" class="album-grid-image py-1 py-sm-2 rounded-0" alt="img">
                            <img src="" class="album-grid-image py-1 py-sm-2 rounded-0" alt="img">
                            <img src="" class="album-grid-image py-1 py-sm-2 rounded-0" alt="img">
                            <img src="" class="album-grid-image py-1 py-sm-2 rounded-0" alt="img">
                        </div>
                    </div>
                </div>
            </div>

            <div class="celebration-box pt-5" id="gift">
                <div class="heading">Hộp mừng cưới</div>

                <div class="row">
                    <div class="col-12 col-sm-6 mb-4">
                        <div class="qr-code pb-3">
                            <h5 class="qr-code__name w-100 text-center text-uppercase">Mừng cô dâu</h5>
                            <img src="./assets/imgs/thu-qr.jpg" alt="QR code">
            
                            <p class="qr-code__info">Ngân hàng: VP Bank</p>
                            <p class="qr-code__info">STK: 68808898</p>
                            <p class="qr-code__info">Chủ tài khoản: Đàm Thị Thu</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="qr-code pb-3">
                            <h5 class="qr-code__name w-100 text-center text-uppercase">Mừng chú rể</h5>
                            <img src="./assets/imgs/cuong-qr.jpg" alt="QR code">

                            <p class="qr-code__info">Ngân hàng: Vietcombank</p>
                            <p class="qr-code__info">STK: 1015652281</p>
                            <p class="qr-code__info">Chủ tài khoản: Đàm Thị Thu</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wish-box py-5" id="wish">
                <h3 class="wish-box__title pt-5">Gửi lời chúc đến chúng tớ nhé!</h3>

                <div class="wrapper pb-5">
                    <div class="background"></div>
                    <div class="row px-4 px-md-5 py-4">
                        <div class="col-12 col-md-6 d-flex justify-content-center">
                            <input type="text" name="fullname" placeholder="Nhập tên của bạn *" id="fullname-wish">
                        </div>
                        <div class="col-12 col-md-6 mt-3 mt-md-0 d-flex justify-content-center">
                            <input type="text" name="email" placeholder="Nhập email" id="email-wish">
                        </div>

                        <div class="col-12 mt-3">
                            <textarea class="w-100" rows="6" name="content" placeholder="Nhập lới chúc của bạn *" id="content-wish"></textarea>
                        </div>

                        <div class="col-12 text-center mt-4 mt-md-5">
                            <button id="submit-wish" class="button">Gửi lời chúc</button>
                        </div>
                    </div>

                    <div class="wish-content mt-5 p-3" id="wish-content-list"></div>
                </div>
            </div>

            <div class="confirm-box pt-5" id="attend">
                <h3 class="title w-100 pt-5 text-center fw-bold text-uppercase">Xác nhận tham dự</h3>

                <div class="row px-3 px-md-5 py-4">
                    <div class="col-12 col-md-6 d-flex justify-content-center">
                        <input type="text" name="fullname" placeholder="Nhập tên của bạn *" id="fullname-attend">
                    </div>
                    <div class="col-12 col-md-6 mt-3 mt-md-0 d-flex justify-content-center">
                        <input type="text" name="email" placeholder="Nhập email" id="email-attend">
                    </div>

                    <div class="col-12 mt-3">
                        <div class="event-box">
                            <h5 class="heading">Sự kiện sẽ tham dự</h5>

                            <div class="row mt-4 justify-content-center">
                                <div class="event d-flex align-items-center col-12 col-md-6 mb-2">
                                    <input class="d-inline me-2" style="width: 16px; height: 16px;" type="checkbox" name="" id="groom-engagement">
                                    <p class="event-name mb-0 d-inline">Lễ ăn hỏi nhà trai</p>
                                </div>
                                <div class="event d-flex align-items-center col-12 col-md-6 mb-2">
                                    <input class="d-inline me-2" style="width: 16px; height: 16px;" type="checkbox" name="" id="bride-engagement">
                                    <p class="event-name mb-0 d-inline">Lễ ăn hỏi nhà gái</p>
                                </div>
                                <div class="event d-flex align-items-center col-12 col-md-6 mb-2">
                                    <input class="d-inline me-2" style="width: 16px; height: 16px;" type="checkbox" name="" id="groom-wedding">
                                    <p class="event-name mb-0 d-inline">Tiệc cưới nhà trai</p>
                                </div>
                                <div class="event d-flex align-items-center col-12 col-md-6 mb-2">
                                    <input class="d-inline me-2" style="width: 16px; height: 16px;" type="checkbox" name="" id="bride-wedding">
                                    <p class="event-name mb-0 d-inline">Tiệc cưới nhà gái</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-center mt-4 mt-md-5">
                        <button class="button" id="submit-attend">Xác nhận</button>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            <h1 class="thankyou py-3 py-md-5">
                <span>Thank you!</span>
            </h1>

            <div class="wrapper py-3 py-md-5">
                <h5 class="title">Thân gửi đến bạn bè & gia đình,</h5>
                <p class="content">
                    Biết ơn và trân quý lắm phút giây trọng đại của chúng tớ/con 
                    được mọi người tới tham dự và chúc phúc, khoảnh khắc ấy
                    sẽ thật ấm áp và đầy ý nghĩa!
                </p>
                <p class="content">Thương.</p>
            </div>

            <h5 class="owner pe-4 pb-5 mb-5">
                <span class="d-inline">Thu & Cuong</span>
                <img src="./assets/imgs/heart.png" alt="Heart icon">
            </h5>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" 
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" 
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" 
        crossorigin="anonymous"></script>

    <script src="./assets/js/constants.js"></script>
    <script src="./assets/js/notify.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="./assets/js/wishes.js"></script>
    <script src="./assets/js/attend.js"></script>
    <script src="./assets/js/image.js"></script>
</body>
</html>