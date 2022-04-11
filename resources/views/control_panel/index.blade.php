@extends('control_panel.layout')
@section('admin_main')
<div id="container" class="container-fluid px-admin-laptop px-admin-tel py-2 mb-3 pe-lg-5 mx-0">
    <h1 class="mt-1">Главная</h1>
    <div class="d-flex gap-3 flex-100">
        <div class="d-flex flex-column bg-light shadow-sm rounded-3 px-3 py-2 w-100">
            <div class="d-flex">
                <span class="fw-custom">Продажи</span>
                <span class="mx-1">|</span>
                <span class="text-muted">Сегодня</span> 
                <div class="dropdown ms-auto">
                    <button class="btn-none py-0 px-2" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Сегодня</a></li>
                        <li><a class="dropdown-item" href="#">Месяц</a></li>
                        <li><a class="dropdown-item" href="#">Год</a></li>
                    </ul>
                </div>
            </div>
            <div class="d-flex mt-2">
                <div class="rounded-circle px-3 py-1" style="background-color: rgba(37, 126, 209, 0.250);">
                    <i class="bi bi-cart2 fs-1" style="color: rgba(37, 126, 209);"></i>
                </div>
                <div class="d-flex flex-column ms-2 mt-1">
                    <span class="h3 fw-custom mb-0">145</span>
                    <div class="d-flex">
                        <span class="me-1 text-success fw-custom">12%</span>
                        <span class="text-muted">увеличение</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column bg-light shadow-sm rounded-3 px-3 py-2 w-100">
            <div class="d-flex">
                <span class="fw-custom">Доход</span>
                <span class="mx-1">|</span>
                <span>Сегодня</span> 
                <div class="dropdown ms-auto">
                    <button class="btn-none py-0 px-2" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Сегодня</a></li>
                        <li><a class="dropdown-item" href="#">Месяц</a></li>
                        <li><a class="dropdown-item" href="#">Год</a></li>
                    </ul>
                </div>
            </div>
            <div class="d-flex mt-2">
                <div class="rounded-circle px-3 py-1" style="background-color: rgba(34, 218, 114, 0.250);">
                    <i class="bi bi-currency-dollar fs-1" style="color: rgba(34, 218, 114);"></i>
                </div>
                <div class="d-flex flex-column ms-2 mt-1">
                    <span class="h3 fw-custom mb-0">257 458 р</span>
                    <div class="d-flex">
                        <span class="me-1 text-success fw-custom">8%</span>
                        <span class="text-muted">увеличение</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column bg-light shadow-sm rounded-3 px-3 py-2 w-100">
            <div class="d-flex">
                <span class="fw-custom">Посетители</span>
                <span class="mx-1">|</span>
                <span>Сегодня</span> 
                <div class="dropdown ms-auto">
                    <button class="btn-none py-0 px-2" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Сегодня</a></li>
                        <li><a class="dropdown-item" href="#">Месяц</a></li>
                        <li><a class="dropdown-item" href="#">Год</a></li>
                    </ul>
                </div>
            </div>
            <div class="d-flex mt-2">
                <div class="rounded-circle px-3 py-1" style="background-color: rgba(0, 0, 0, 0.250);">
                    <i class="bi bi-people fs-1"></i>
                </div>
                <div class="d-flex flex-column ms-2 mt-1">
                    <span class="h3 fw-custom mb-0">1244</span>
                    <div class="d-flex">
                        <span class="me-1 text-danger fw-custom">5%</span>
                        <span class="text-muted">уменьшение</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column bg-light shadow-sm rounded-3 px-3 py-2 mt-3 tel-scroll">
        <div class="d-flex w-1000">
            <span class="fw-custom">Популярные товары</span>
            <span class="mx-1">|</span>
            <span>Сегодня</span> 
            <div class="dropdown ms-auto">
                <button class="btn-none py-0 px-2" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-h"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Сегодня</a></li>
                    <li><a class="dropdown-item" href="#">Месяц</a></li>
                    <li><a class="dropdown-item" href="#">Год</a></li>
                </ul>
            </div>
        </div>
        <div class="d-flex mt-2 rounded-3 px-3 w-1000" style="background-color: rgba(0, 0, 0, 0.150);">
            <div class="fw-custom ms-1">Продукт</div>
            <div class="fw-custom me-auto" style="margin-left: 37px;">Название</div>
            <div class="fw-custom d-flex me-1" style="width: 100px;">
                <span class="ms-auto">Цена</span>
            </div>
            <div class="fw-custom d-flex" style="margin-right: 60px; width: 100px;">
                <span class="ms-auto">id</span>
            </div>
            <div class="fw-custom d-flex me-1" style="margin-right: 60px; width: 100px;">
                <span class="ms-auto">Продавец</span>
            </div>
        </div>
        <div class="d-flex mt-3 flex-column pe-3 w-1000">
            <div class="d-flex align-items-center">
                <img class="popular-tovar ms-4" src="https://avatars.mds.yandex.net/i?id=5443b996638f70bffecb29321a139e94-5483446-images-thumbs&n=13&exp=1" alt="...">
                <div class="ms-5 fw-custom me-auto">Часы версачи</div>
                <div class="d-flex me-1" style="width: 100px;">
                    <span class="ms-auto">2000 р</span>
                </div>
                <div class="d-flex" style="margin-right: 60px; width: 100px;">
                    <span class="ms-auto">24</span>
                </div>
                <div class="d-flex me-1" style="margin-right: 60px; width: 100px;">
                    <img class="ms-auto me-1 popular-tovar pounded-circle" src="https://static.tildacdn.com/tild6361-3034-4333-b833-353964363837/pngwingcom_2.png" alt="...">
                </div>
            </div>
        </div>
        <div class="d-flex mt-3 flex-column pe-3 w-1000">
            <div class="d-flex align-items-center">
                <img class="popular-tovar ms-4" src="https://topgshop.ru/image/cache/data/brands/casio/62/e8/ga-400-1a/ga-400-1a-1000x1000.jpg" alt="...">
                <div class="ms-5 fw-custom me-auto">Часы гучи</div>
                <div class="d-flex me-1" style="width: 100px;">
                    <span class="ms-auto">30000 р</span>
                </div>
                <div class="d-flex" style="margin-right: 60px; width: 100px;">
                    <span class="ms-auto">65</span>
                </div>
                <div class="d-flex me-1" style="margin-right: 60px; width: 100px;">
                    <img class="ms-auto me-1 popular-tovar pounded-circle" src="https://static.tildacdn.com/tild6361-3034-4333-b833-353964363837/pngwingcom_2.png" alt="...">
                </div>
            </div>
        </div>
        <div class="d-flex mt-3 flex-column pe-3 w-1000">
            <div class="d-flex align-items-center">
                <img class="popular-tovar ms-4" src="https://t-storage.ru/wp-content/uploads/2019/08/T006.407.16.053.00.jpg" alt="...">
                <div class="ms-5 fw-custom me-auto">Часы laravel</div>
                <div class="d-flex me-1" style="width: 100px;">
                    <span class="ms-auto">2999 р</span>
                </div>
                <div class="d-flex" style="margin-right: 60px; width: 100px;">
                    <span class="ms-auto">524</span>
                </div>
                <div class="d-flex me-1" style="margin-right: 60px; width: 100px;">
                    <img class="ms-auto me-1 popular-tovar pounded-circle" src="https://static.tildacdn.com/tild6361-3034-4333-b833-353964363837/pngwingcom_2.png" alt="...">
                </div>
            </div>
        </div>
        <div class="d-flex mt-3 flex-column pe-3 w-1000">
            <div class="d-flex align-items-center">
                <img class="popular-tovar ms-4" src="https://time-team.ru/image/cache/catalog/products/1267/ga-110gb-1a-7890-1024x1024.jpg" alt="...">
                <div class="ms-5 fw-custom me-auto">Часы vue</div>
                <div class="d-flex me-1" style="width: 100px;">
                    <span class="ms-auto">99999 р</span>
                </div>
                <div class="d-flex" style="margin-right: 60px; width: 100px;">
                    <span class="ms-auto">635</span>
                </div>
                <div class="d-flex me-1" style="margin-right: 60px; width: 100px;">
                    <img class="ms-auto me-1 popular-tovar pounded-circle" src="https://static.tildacdn.com/tild6361-3034-4333-b833-353964363837/pngwingcom_2.png" alt="...">
                </div>
            </div>
        </div>
        <div class="d-flex mt-3 flex-column pe-3 w-1000">
            <div class="d-flex align-items-center">
                <img class="popular-tovar ms-4" src="https://topgshop.ru/image/cache/data/brands/casio/95/ee/a-168wegc-5e/a-168wegc-5e-1000x1000.jpg" alt="...">
                <div class="ms-5 fw-custom me-auto">Часы js</div>
                <div class="d-flex me-1" style="width: 100px;">
                    <span class="ms-auto">77777 р</span>
                </div>
                <div class="d-flex" style="margin-right: 60px; width: 100px;">
                    <span class="ms-auto">44</span>
                </div>
                <div class="d-flex me-1" style="margin-right: 60px; width: 100px;">
                    <img class="ms-auto me-1 popular-tovar pounded-circle" src="https://static.tildacdn.com/tild6361-3034-4333-b833-353964363837/pngwingcom_2.png" alt="...">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection