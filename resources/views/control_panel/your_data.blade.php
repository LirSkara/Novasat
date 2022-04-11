@extends('control_panel.layout')
@section('admin_main')
<div id="container" class="container-fluid px-admin-laptop px-admin-tel py-2 mb-3 pe-lg-5 mx-0">
    <div class="d-flex">
        <h1 class="mt-1">Ваши данные</h1>
    </div>
    <div class="d-flex gap-3 mt-3 flex-100" id="your_data">
        <div v-for="(item, ib) in your_data" :key="item" class="d-flex flex-column bg-light shadow-sm rounded-3 px-2 pt-2 pb-1 w-100">
            <div class="d-flex">
                <div class="dropdown ms-auto">
                    <button class="btn-none py-0 px-2" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><button class="dropdown-item" data-mdb-toggle="modal" :data-mdb-target="'#edityour_data' + item.id"><i class="far fa-edit me-2"></i>Редактировать</button></li>
                    </ul>
                </div>
            </div>
            <div class="d-flex flex-column rounded-3 text-dark px-2">
                <div class="d-flex">
                    <span>Город:</span>
                    <span class="ms-2">@{{item.city}}</span>
                </div>
                <div class="d-flex">
                    <span>Номер:</span>
                    <span class="ms-2">@{{item.number}}</span>
                </div>
                <div class="d-flex">
                    <span>Почта:</span>
                    <span class="ms-2">@{{item.mail}}</span>
                </div>
            </div>
            
            <!-- Start Modal Your_data Block -->
            <div class="modal fade" :id="'edityour_data' + item.id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0 pb-0">
                            <h4 class="modal-title" id="exampleModalLabel">Редактирование сервисов</h4>
                            <button type="button" class="btn-close" :id="'closeEditModal' + ib" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form :id="'formEditYour_data' + ib" class="d-flex flex-column">
                            @csrf
                                <div class="form-floating mb-3">
                                    <input type="text" name="city" v-model="item.city" class="form-control" id="btn" placeholder="name@example.com">
                                    <label for="btn">Город</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="number" v-model="item.number" class="form-control" id="name" placeholder="name@example.com">
                                    <label for="name">Номер</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="mail" v-model="item.mail" class="form-control" id="name" placeholder="name@example.com">
                                    <label for="name">Почта</label>
                                </div>
                                <button v-on:click="edit_your_data(ib)" class="btn btn-lg btn-dark"><i class="far fa-edit me-2"></i>Редактировать</button>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
            <!-- Finish Modal Your_data Block -->

        </div>

    </div>

</div>

<script>
const Your_data = {
    data() {
        return {
            your_data: [],
            editLink: '',
            editImage: ''
        }
    },
    beforeMount(){
        this.all()
    },
    methods: {
        edit_your_data(ib) {
            event.preventDefault();
            var prom = this.your_data
            var e_item = prom[ib]
            var formDataEdit = new FormData($(`#formEditYour_data${ib}`)[0]);
            $.ajax({
                type: "POST", //Метод отправки
                url: `/edit_your_data/${e_item.id}`, //путь до php фаила отправителя
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
            var prom = this.your_data
            $.ajax({    
                type: "GET", 
                url: '/all_your_data',
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    data.forEach(function(elem) {
                        prom.push({
                            id: elem['id'],
                            city: elem['city'],
                            number: elem['number'],
                            mail: elem['mail']
                        })
                    })
                }
            })
        }
    }
}
Vue.createApp(Your_data).mount('#your_data')
</script>
@endsection