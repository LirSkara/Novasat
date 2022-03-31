<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body @yield('body-class') class="bg-light-blue">
    <!-- Начало навбара -->
    <header class="container bg-dark py-1 navbar-position">
        <div class="d-flex">
            <div class="me-2 pe-0">
                <button class="btn btn-none px-0 py-0" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDetailed" aria-controls="offcanvasDetailed">
                    <i class="bi bi-list text-white fs-2"></i>
                </button>
            </div>
            <a href="/admin_panel" class="text-white text-decoration-none py-1 fs-4 ps-0 me-auto">Управление</a>
            <div class="btn-group dropstart btn-setting-profile">
                <button type="button" class="btn px-1 py-1" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-person-fill text-white fs-3"></i>
                </button>
                <ul class="dropdown-menu drop-position">
                    <li><a href="/" class="dropdown-item" type="button">Выйти</a></li>
                </ul>
            </div>
            @yield('search')
        </div>
    </header>
    <!-- Конец Навбара -->

    @yield('admin_content')

<!-- Начало каталога детали -->
<div class="offcanvas offcanvas-start w-100" style="width: 87% !important;" tabindex="-1" id="offcanvasDetailed" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header py-1 px-2">
        <div class="d-flex w-100">
            <h2 class="mt-1">Управление</h2>
            <button class="btn btn-none px-0 py-0 ms-auto" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="bi bi-x text-muted fs-1"></i>
            </button>
        </div>        
    </div>
    <div class="offcanvas-body py-0 pb-4 px-0">
        <div class="container px-0">
            <ul class="list-group">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Основные настройки
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body px-0 py-0">
                                <div>
                                    <a href="/bluzki-i-rubashki" class="text-dark text-decoration-none py-3 ps-5 accordionbody-pl d-block w-100">Блузки и рубашки</a>
                                </div>
                                <div>
                                    <a href="#" class="text-dark text-decoration-none py-3 ps-5 accordionbody-pl d-block w-100">Брюки</a>
                                </div>
                                <div>
                                    <a href="#" class="text-dark text-decoration-none py-3 ps-5 accordionbody-pl d-block w-100">Верхняя одежда</a>
                                </div>
                                <div>
                                    <a href="#" class="text-dark text-decoration-none py-3 ps-5 accordionbody-pl d-block w-100">Водолазки</a>
                                </div>
                                <div>
                                    <a href="#" class="text-dark text-decoration-none py-3 ps-5 accordionbody-pl d-block w-100">Джемперы и кардиганы</a>
                                </div>
                                <div>
                                    <a href="#" class="text-dark text-decoration-none py-3 ps-5 accordionbody-pl d-block w-100">Джинсы</a>
                                </div>
                                <div>
                                    <a href="#" class="text-dark text-decoration-none py-3 ps-5 accordionbody-pl d-block w-100">Жилеты</a>
                                </div>
                                <div>
                                    <a href="#" class="text-dark text-decoration-none py-3 ps-5 accordionbody-pl d-block w-100">Карнавальные костюмы</a>
                                </div>
                                <div>
                                    <a href="#" class="text-dark text-decoration-none py-3 ps-5 accordionbody-pl d-block w-100">Кигуруми</a>
                                </div>
                                <div>
                                    <a href="#" class="text-dark text-decoration-none py-3 ps-5 accordionbody-pl d-block w-100">Комбинезоны</a>
                                </div>
                                <div>
                                    <a href="#" class="text-dark text-decoration-none py-3 ps-5 accordionbody-pl d-block w-100">Костюмы</a>
                                </div>
                                <div>
                                    <a href="#" class="text-dark text-decoration-none py-3 ps-5 accordionbody-pl d-block w-100">Лонгсливы</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Администрирование
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body px-0 py-0">
                                <div>
                                    <a href="#" class="text-dark text-decoration-none py-3 ps-3 ps-5 accordionbody-pl d-block w-100">Белье</a>
                                </div>
                                <div>
                                    <a href="#" class="text-dark text-decoration-none py-3 ps-3 ps-5 accordionbody-pl d-block w-100">Блузки, рубашки, туники</a>
                                </div>
                                <div>
                                    <a href="#" class="text-dark text-decoration-none py-3 ps-3 ps-5 accordionbody-pl d-block w-100">Верхняя одежда</a>
                                </div>
                                <div>
                                    <a href="#" class="text-dark text-decoration-none py-3 ps-3 ps-5 accordionbody-pl d-block w-100">Джинсы, брюки</a>
                                </div>
                                <div>
                                    <a href="#" class="text-dark text-decoration-none py-3 ps-3 ps-5 accordionbody-pl d-block w-100">Жилеты</a>
                                </div>
                                <div>
                                    <a href="#" class="text-dark text-decoration-none py-3 ps-3 ps-5 accordionbody-pl d-block w-100">Костюмы</a>
                                </div>
                                <div>
                                    <a href="#" class="text-dark text-decoration-none py-3 ps-3 ps-5 accordionbody-pl d-block w-100">Купальники</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Управление
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body px-0 py-0">
                                <div>
                                    <a href="/c_carousel" class="text-dark text-decoration-none py-3 ps-5 accordionbody-pl d-block w-100">Категории</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
    </div>
</div>
<!-- КОнец каталога детали -->

</body>
</html>