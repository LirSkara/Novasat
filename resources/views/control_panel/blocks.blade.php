@extends('control_panel.layout')
@section('admin_main')
<div id="container" class="container-fluid px-admin-laptop px-admin-tel py-2 mb-3 pe-lg-5 mx-0">
    <div class="d-flex">
        <h1 class="mt-1">Блоки</h1>
    </div>
    <div class="d-flex gap-3 mt-3 flex-100" id="block">
        <div v-for="(item, ib) in block" :key="item" class="d-flex flex-column bg-light shadow-sm rounded-3 px-3 pt-2 pb-3 cp-cart">
            <div class="d-flex">
                <span class="fw-custom">Ссылка:</span>
                <span class="text-muted ms-1 text-truncate">@{{item.link}}</span> 
                <div class="dropdown ms-auto">
                    <button class="btn-none py-0 px-2" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><button class="dropdown-item" data-mdb-toggle="modal" :data-mdb-target="'#editblock' + item.id"><i class="far fa-edit me-2"></i>Редактировать</button></li>
                    </ul>
                </div>
            </div>
            <div class="d-flex flex-column rounded-3 text-dark px-3 pt-4" :style="'background-image: url(/storage/blocks/' + item.image + '); height: 200px; background-size: cover;'">
                <h4>@{{item.name}}</h4>
                <p class="text-muted">@{{item.description}}</p>
                <div>
                    <button class="btn bg-warning text-white">@{{item.btn_text}}</button>
                </div>
            </div>
            
            <!-- Start Modal Edit Block -->
            <div class="modal fade" :id="'editblock' + item.id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0 pb-0">
                            <h4 class="modal-title" id="exampleModalLabel">Редактирование акции</h4>
                            <button type="button" class="btn-close" :id="'closeEditModal' + ib" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form :id="'formEditBlock' + ib" class="d-flex flex-column">
                            @csrf
                                <input type="file" name="image" class="form-control form-control-lg mb-2" id="editFile" />
                                <div class="form-floating mb-3">
                                    <input type="text" name="name" v-model="item.name" class="form-control" id="name" placeholder="name@example.com">
                                    <label for="name">Название акции</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="description" v-model="item.description" class="form-control" id="description" placeholder="name@example.com">
                                    <label for="description">Описание акции</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="btn_text" v-model="item.btn_text" class="form-control" id="btn" placeholder="name@example.com">
                                    <label for="btn">Текст кнопки</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="link" v-model="item.link" class="form-control" id="link" placeholder="name@example.com">
                                    <label for="link">Ссылка</label>
                                </div>
                                <button v-on:click="edit_block(ib)" class="btn btn-lg btn-dark"><i class="far fa-edit me-2"></i>Редактировать</button>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
            <!-- Finish Modal Edit Block -->

        </div>

    </div>

</div>

<script>
const BLock = {
    data() {
        return {
            block: [],
            editLink: '',
            editImage: ''
        }
    },
    beforeMount(){
        this.all()
    },
    methods: {
        edit_block(ib) {
            event.preventDefault();
            var prom = this.block
            var e_item = prom[ib]
            var formDataEdit = new FormData($(`#formEditBlock${ib}`)[0]);
            $.ajax({
                type: "POST", //Метод отправки
                url: `/edit_block/${e_item.id}`, //путь до php фаила отправителя
                cache:false, // кэш и прочие настройки писать именно так (для файлов)
                contentType: false, // нужно указать тип контента false для картинки(файла)
                processData: false,
                data: formDataEdit  ,
                success: function(data) {
                    document.getElementById(`closeEditModal${ib}`).click()
                    e_item.image = data 
                }
            });
        },
        all() {
            var prom = this.block
            $.ajax({    
                type: "GET", 
                url: '/all_blocks',
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    data.forEach(function(elem) {
                        prom.push({
                            id: elem['id'],
                            image: elem['image'],
                            name: elem['name'],
                            description: elem['description'],
                            btn_text: elem['btn_text'],
                            link: elem['link'],
                        })
                    })
                }
            })
        }
    }
}
Vue.createApp(BLock).mount('#block')
</script>
@endsection