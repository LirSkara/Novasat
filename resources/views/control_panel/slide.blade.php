@extends('control_panel.layout')
@section('admin_main')
<div id="container" class="container-fluid px-admin-laptop px-admin-tel py-2 mb-3 pe-lg-5 mx-0">
    <div class="d-flex">
        <h1 class="mt-1">Слайдер</h1>
        <button class="btn btn-lightdark ms-auto" data-mdb-toggle="modal" data-mdb-target="#exampleModal"><i class="fas fa-plus fs-4"></i></button>
    </div>
    <div class="d-flex gap-3 mt-3 flex-100" id="addSlide">
        <div v-for="(item, ib) in slides" :key="item" class="d-flex flex-column bg-light shadow-sm rounded-3 px-3 pt-2 pb-3 cp-cart">
            <div class="d-flex">
                <span class="fw-custom">Ссылка:</span>
                <span class="text-muted ms-1 text-truncate">@{{item.link}}</span> 
                <div class="dropdown ms-auto">
                    <button class="btn-none py-0 px-2" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><button class="dropdown-item" data-mdb-toggle="modal" :data-mdb-target="'#editslide' + item.id"><i class="far fa-edit me-2"></i>Редактировать</button></li>
                        <li><button class="dropdown-item" data-mdb-toggle="modal" :data-mdb-target="'#deleteslide' + item.id"><i class="fas fa-trash me-2"></i>Удалить</button></li>
                    </ul>
                </div>
            </div>
            <img class="rounded-3" style="height: 200px; object-fit: cover;" :src="'/storage/slide/' + item.image" alt="...">
            
            <!-- Start Modal Edit Slide -->
            <div class="modal fade" :id="'editslide' + item.id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0 pb-0">
                            <h4 class="modal-title" id="exampleModalLabel">Редактирование карусели</h4>
                            <button type="button" class="btn-close" :id="'closeEditModal' + ib" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form :id="'formEdit' + ib" class="d-flex flex-column">
                            @csrf
                                <input type="file" name="image" class="form-control form-control-lg mb-2 border-dark" id="editFile" />
                                <input type="text" name="link" v-model="item.link" id="formControlLg" class="form-control form-control-lg text-dark mb-2 border-dark">
                                <button v-on:click="edit_slider(ib)" class="btn btn-lg btn-dark"><i class="far fa-edit me-2"></i>Редактировать</button>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
            <!-- Finish Modal Edit SLide -->

            <!-- Start Modal Delete Slide -->
            <div class="modal fade" :id="'deleteslide' + item.id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                        <div class="modal-header border-0 pb-0">
                            <h4 class="modal-title" id="exampleModalLabel">Удаление</h4>
                            <button type="button" class="btn-close" :id="'closeDeleteModal' + ib" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Вы действительно хотите удалить эту карусель? Отменить это действие будет невозможно</p>
                            <div class="d-flex gap-2">
                                <button class="btn btn-outline-dark ms-auto w-25" data-mdb-dismiss="modal" aria-label="Close">Нет</button>
                                <button v-on:click="delete_slider(ib)" class="btn btn-dark w-25">Да</button>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <!-- Finish Modal Delete SLide -->

        </div>

        <!-- Modal Add Slide -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0 pb-0">
                        <h4 class="modal-title" id="exampleModalLabel">Добавление карусели</h4>
                        <button type="button" class="btn-close" id="closeAddModal" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form">
                        @csrf
                            <div class="mb-2">
                                <input type="file" name="image" class="form-control form-control-lg border-dark" id="file" />
                                <div class="text-danger">@{{errorFile}}</div>
                            </div>
                            <div class="mb-2">
                                <div class="form-outline">
                                    <input type="text" name="link" v-model="addLink" id="link" class="form-control form-control-lg text-dark" required>
                                    <label class="form-label text-dark" for="link" style="margin-left: 0px;">Введите ссылку</label>
                                    <div class="invalid-feedback">Please provide a valid city.</div>
                                    <div class="form-notch"><div class="form-notch-leading border-dark" style="width: 9px;"></div><div class="form-notch-middle border-dark" style="width: 94.4px;"></div><div class="form-notch-trailing border-dark"></div></div>
                                </div>
                                <div class="text-danger">@{{errorLink}}</div>
                            </div>
                            <button v-on:click="add_slider()" class="btn btn-lg btn-dark w-100"><i class="fas fa-plus me-2"></i>Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
const AddSlide = {
    data() {
        return {
            slides: [],
            addLink: '',
            editLink: '',
            errorFile: '',
            errorLink: '',
            editImage: ''
        }
    },
    beforeMount(){
        this.all()
    },
    methods: {
        add_slider() {
            event.preventDefault(); //Отключаем обновление страницы
            if(document.getElementById("file").files.length != 0){
                if(this.addLink != '') {

                    var formData = new FormData($('#form')[0]);
                    var prom = this.slides
                    $.ajax({
                        type: "POST", //Метод отправки
                        url: "/add_slider", //путь до php фаила отправителя
                        cache:false, // кэш и прочие настройки писать именно так (для файлов)
                        contentType: false, // нужно указать тип контента false для картинки(файла)
                        processData: false,
                        data: formData,
                        success: function(data) {
                            closeAddModal.click()
                            prom.push({
                                id: data['id'],
                                image: data['image'],
                                link: data['link'],
                            })
                            setTimeout(function() {
                                height = document.body.scrollHeight;
                                window.scroll({top: height});
                            }, 500)
                        }
                    });
                    
                    form.reset()
                    this.addLink = ''
                    this.errorFile = ''
                    this.errorLink = ''
                } else {
                    this.errorFile = ''
                    this.errorLink = 'Это поле обязательно'
                }
            } else {
                this.errorFile = 'Это поле обязательно'
            }
        },
        edit_slider(ib) {
            event.preventDefault();
            var prom = this.slides
            var e_item = prom[ib]
            var formDataEdit = new FormData($(`#formEdit${ib}`)[0]);
            $.ajax({
                type: "POST", //Метод отправки
                url: `/edit_slider/${e_item.id}`, //путь до php фаила отправителя
                cache:false, // кэш и прочие настройки писать именно так (для файлов)
                contentType: false, // нужно указать тип контента false для картинки(файла)
                processData: false,
                data: formDataEdit,
                success: function(data) {
                    document.getElementById(`closeEditModal${ib}`).click()
                    e_item.image = data 
                }
            });
        },
        delete_slider(ib) {
            event.preventDefault();
            var prom = this.slides
            var e_item = prom[ib]
            $.ajax({    
                type: "GET", 
                url: `/delete_slider/${e_item.id}`,
                method: 'get',
                success: function(data) {
                    document.getElementById(`closeDeleteModal${ib}`).click()
                    prom.splice(ib, 1)
                }
            })
        },
        all() {
            var prom = this.slides
            $.ajax({    
                type: "GET", 
                url: '/all_slide',
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    data.forEach(function(elem) {
                        prom.push({
                            id: elem['id'],
                            image: elem['image'],
                            link: elem['link'],
                        })
                    })
                }
            })
        }
    }
}
Vue.createApp(AddSlide).mount('#addSlide')
</script>
@endsection