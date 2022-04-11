<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Assets Icon -->
    <link rel="stylesheet" href="assets/css/LineIcons.3.0.css" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css" rel="stylesheet"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
    <!-- Ajax -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Vue Js -->
    <script src="https://unpkg.com/vue@next"></script>
    <!-- Мои стили -->
    <link rel="stylesheet" href="/admin.css">
</head>
<body id="admin_body" class="pt-main bg-admin" style="overflow-x: hidden;">
    <header class="container-fluid bg-dark text-white py-2 px-lg-5 fixed-top" style="z-index: 300;">
        <div class="d-flex">
            <div class="d-flex align-items-center me-2">
                <button id="admin_menu_laptop" onclick="admin_menu_laptop()" class="btn bg-light py-1 px-3 tel-d-none"><i class="fas fa-bars fs-5 py-2"></i></button>
                <button id="admin_menu_tel" onclick="admin_menu_tel()" class="btn bg-light py-1 px-3 laptop-d-none"><i class="fas fa-bars fs-5 py-2"></i></button>
            </div>
            <a href="/control_panel" class="mb-0 text-white text-decoration-none d-flex align-items-center">
                <h2 class="mb-0">Управление</h2>
            </a>
            <div id="search" class="d-flex shadow-sm ms-auto tel-d-none" style="width: 70%">
                <input type="search" id="input_search" v-on:input="search()" v-model="write" class="main-search px-3 text-white ms-auto border-search border-bottom-left">
                <button id="btn_search" class="btn btn-search px-3 border-bottom-right"><i class="bi bi-search text-white fs-6"></i></button>

                <div id="result_search" class="bg-white d-flex flex-column result-search py-1 d-none">
                    <div v-if="catalogsarray != ''" class="w-100">
                        <div v-for="item in catalogsarray" :key="item">
                            <a :href="item.link" class="text-dark py-2 w-100 d-block px-3">@{{item.name}}</a>
                        </div>
                    </div>
                    <div v-else>
                        <span class="text-dark px-3">Ничего не найдено</span>
                    </div>
                </div>

            </div>
            <div class="ms-search">
                <button class="btn py-2 px-btn laptop-d-none">
                    <i class="bi bi-search text-white fs-4"></i>
                </button>
                <a href="/" class="btn py-2 px-btn">
                    <i class="bi bi-box-arrow-right text-white fs-4"></i>
                </a>
            </div>
        </div>
    </header>
    @yield('admin_main')





<div id="admin_canvas" class="admin_canvas border-0 shadow-sm bg-white pt-3 px-3 d-canvas-block d-canvas-none pb-3" style="z-index: 100; overflow-y: scroll; height: 92vh; scrollbar-width: none;">
    <div class="d-flex flex-column">
        <a href="/control_panel" class="btn text-start btn-lightdark mb-2 fs-6"><i class="bi bi-grid me-2 fs-6"></i> Главная</a>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item border-0">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed accardion-px" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <i class="bi bi-gear me-2"></i> Основные настройки
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body px-0 py-0">
                        <div>
                            <a href="#" class="text-dark text-decoration-none py-3 accordionbody-pl d-block w-100 ps-5"><i class="bi bi-card-list me-2"></i>Категории</a>
                        </div>
                        <div>
                            <a href="/cp_slide" class="text-dark text-decoration-none py-3 accordionbody-pl d-block w-100 ps-5"><i class="bi bi-aspect-ratio me-2"></i>Слайдер</a>
                        </div>
                        <div>
                            <a href="/cp_advertising" class="text-dark text-decoration-none py-3 accordionbody-pl d-block w-100 ps-5"><i class="bi bi-border-all me-2"></i>Рекламный блок</a>
                        </div>
                        <div>
                            <a href="/cp_stock" class="text-dark text-decoration-none py-3 accordionbody-pl d-block w-100 ps-5"><i class="bi bi-border-all me-2"></i>Акция</a>
                        </div>
                        <div>
                            <a href="/cp_blocks" class="text-dark text-decoration-none py-3 accordionbody-pl d-block w-100 ps-5"><i class="bi bi-border-all me-2"></i>2 блока снизу</a>
                        </div>
                        <div>
                            <a href="/cp_banner" class="text-dark text-decoration-none py-3 accordionbody-pl d-block w-100 ps-5"><i class="bi bi-border-all me-2"></i>Баннер</a>
                        </div>
                        <div>
                            <a href="/cp_servises" class="text-dark text-decoration-none py-3 accordionbody-pl d-block w-100 ps-5"><i class="bi bi-border-all me-2"></i>Сервисы</a>
                        </div>
                        <div>
                            <a href="/cp_social_network" class="text-dark text-decoration-none py-3 accordionbody-pl d-block w-100 ps-5"><i class="bi bi-border-all me-2"></i>Соцсети</a>
                        </div>
                        <div>
                            <a href="/cp_your_data" class="text-dark text-decoration-none py-3 accordionbody-pl d-block w-100 ps-5"><i class="bi bi-border-all me-2"></i>Ваши данные</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item border-0">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed accardion-px" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <i class="bi bi-person-workspace me-2"></i> Администрирование
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body px-0 py-0">
                        <div>
                            <a href="#" class="text-dark text-decoration-none py-3 accordionbody-pl d-block w-100 ps-5"><i class="bi bi-shop me-2"></i>Список магазинов</a>
                        </div>
                        <div>
                            <a href="#" class="text-dark text-decoration-none py-3 accordionbody-pl d-block w-100 ps-5"><i class="bi bi-person-badge me-2"></i>Продавцы</a>
                        </div>
                        <div>
                            <a href="#" class="text-dark text-decoration-none py-3 accordionbody-pl d-block w-100 ps-5"><i class="bi bi-person-workspace me-2"></i>Управляющий персонал</a>
                        </div>
                        <div>
                            <a href="#" class="text-dark text-decoration-none py-3 accordionbody-pl d-block w-100 ps-5"><i class="bi bi-person-workspace me-2"></i>Новые заказы</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="blackout" class="blackout d-none"></div>

<script>
const Search = {
    data() {
        return {
            write: '',
            catalogs: [
                {"name": "Слайдер", "link": "/cp_slide"},
                {"name": "Рекламный блок ", "link": "/cp_advertising"},
                {"name": "Акция", "link": "/cp_stock"},
                {"name": "2 блока снизу", "link": "/cp_blocks"},
                {"name": "Баннер", "link": "/cp_banner"},
                {"name": "Сервисы", "link": "/cp_servises"},
                {"name": "Соцсети", "link": "/cp_social_network"},
                {"name": "Ваши данные", "link": "/cp_your_data"}
            ],
            catalogsarray: [],
        }
    },
    methods: {
        search() {
            if(this.write != '') {
                btn_search.classList.remove('border-bottom-right')
                input_search.classList.remove('border-bottom-left')
                result_search.classList.remove('d-none')

                this.catalogsarray = this.catalogs,
                searchString = this.write;

                if(!searchString){
                    if(searchString != ''){
                        return catalogsarray;
                    }
                }

                searchString = searchString.trim().toLowerCase();
                this.catalogsarray = this.catalogsarray.filter(function(item){
                    if(item.name.toLowerCase().indexOf(searchString) !== -1){
                        return item;
                    }
                })
                
                return this.catalogsarray
            } else {
                btn_search.classList.add('border-bottom-right')
                input_search.classList.add('border-bottom-left')
                result_search.classList.add('d-none')
            }
        }
    }
}
Vue.createApp(Search).mount('#search')
</script>

<script src="/admin.js"></script>
</body>
</html>