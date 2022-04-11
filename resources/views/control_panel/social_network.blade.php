@extends('control_panel.layout')
@section('admin_main')
<div id="container" class="container-fluid px-admin-laptop px-admin-tel py-2 mb-3 pe-lg-5 mx-0">
    <div class="d-flex">
        <h1 class="mt-1">Социальные сети</h1>
    </div>
    <div class="d-flex gap-3 mt-3 flex-100" id="social_network">
        <div v-for="(item, ib) in social_network" :key="item" class="d-flex flex-column bg-light shadow-sm rounded-3 px-2 pt-2 pb-1 w-100">
            <div class="d-flex">
                <div class="dropdown ms-auto">
                    <button class="btn-none py-0 px-2" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><button class="dropdown-item" data-mdb-toggle="modal" :data-mdb-target="'#editsocial_network' + item.id"><i class="far fa-edit me-2"></i>Редактировать</button></li>
                    </ul>
                </div>
            </div>
            <div class="d-flex flex-column rounded-3 text-dark px-1">
                <div class="d-flex">
                    <span>Иконка:</span>
                    <div class="text-center ms-2" style="color: #f59636; font-size: 17px;" v-html="item.icon"></div>
                </div>
                <div class="d-flex">
                    <span>Ссылка:</span>
                    <p class="text-muted ms-2 text-center small">@{{item.link}}</p>
                </div>
            </div>
            
            <!-- Start Modal Social_network Block -->
            <div class="modal fade" :id="'editsocial_network' + item.id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0 pb-0">
                            <h4 class="modal-title" id="exampleModalLabel">Редактирование сервисов</h4>
                            <button type="button" class="btn-close" :id="'closeEditModal' + ib" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form :id="'formEditSocial_network' + ib" class="d-flex flex-column">
                            @csrf
                                <div class="form-floating mb-3">
                                    <input type="text" name="icon" v-model="item.icon" class="form-control" id="btn" placeholder="name@example.com">
                                    <label for="btn">Иконка</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="link" v-model="item.link" class="form-control" id="name" placeholder="name@example.com">
                                    <label for="name">Ссылка</label>
                                </div>
                                <button v-on:click="edit_social_network(ib)" class="btn btn-lg btn-dark"><i class="far fa-edit me-2"></i>Редактировать</button>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
            <!-- Finish Modal Social_network Block -->

        </div>

    </div>

</div>

<script>
const Social_network = {
    data() {
        return {
            social_network: [],
            editLink: '',
            editImage: ''
        }
    },
    beforeMount(){
        this.all()
    },
    methods: {
        edit_social_network(ib) {
            event.preventDefault();
            var prom = this.social_network
            var e_item = prom[ib]
            var formDataEdit = new FormData($(`#formEditSocial_network${ib}`)[0]);
            $.ajax({
                type: "POST", //Метод отправки
                url: `/edit_social_network/${e_item.id}`, //путь до php фаила отправителя
                cache:false, // кэш и прочие настройки писать именно так (для файлов)
                contentType: false, // нужно указать тип контента false для картинки(файла)
                processData: false,
                data: formDataEdit  ,
                success: function(data) {
                    document.getElementById(`closeEditModal${ib}`).click()
                }
            });
        },
        all() {
            var prom = this.social_network
            $.ajax({    
                type: "GET", 
                url: '/all_social_network',
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    data.forEach(function(elem) {
                        prom.push({
                            id: elem['id'],
                            icon: elem['icon'],
                            link: elem['link']
                        })
                    })
                }
            })
        }
    }
}
Vue.createApp(Social_network).mount('#social_network')
</script>
@endsection