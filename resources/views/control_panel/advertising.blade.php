@extends('control_panel.layout')
@section('admin_main')
<div id="container" class="container-fluid px-admin-laptop px-admin-tel py-2 mb-3 pe-lg-5 mx-0">
    <div class="d-flex">
        <h1 class="mt-1">Рекламный блок</h1>
    </div>
    <div class="d-flex gap-3 mt-3 flex-100" id="advertising">
        <div v-for="(item, ib) in advertising" :key="item" class="d-flex flex-column bg-light shadow-sm rounded-3 px-3 pt-2 pb-3 cp-cart">
            <div class="d-flex">
                <span class="fw-custom">Ссылка:</span>
                <span class="text-muted ms-1 text-truncate">@{{item.link}}</span> 
                <div class="dropdown ms-auto">
                    <button class="btn-none py-0 px-2" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><button class="dropdown-item" data-mdb-toggle="modal" :data-mdb-target="'#editadvertising' + item.id"><i class="far fa-edit me-2"></i>Редактировать</button></li>
                    </ul>
                </div>
            </div>
            <img class="rounded-3" style="height: 200px; object-fit: cover;" :src="'/storage/advertising/' + item.image" alt="...">
            
            <!-- Start Modal Edit Slide -->
            <div class="modal fade" :id="'editadvertising' + item.id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0 pb-0">
                            <h4 class="modal-title" id="exampleModalLabel">Редактирование рекламного блока</h4>
                            <button type="button" class="btn-close" :id="'closeEditModal' + ib" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form :id="'formEditAdvertising' + ib" class="d-flex flex-column">
                            @csrf
                                <input type="file" name="image" class="form-control form-control-lg mb-2 border-dark" id="editFile" />
                                <input type="text" name="link" v-model="item.link" id="formControlLg" class="form-control form-control-lg text-dark mb-2 border-dark">
                                <button v-on:click="edit_advertising(ib)" class="btn btn-lg btn-dark"><i class="far fa-edit me-2"></i>Редактировать</button>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
            <!-- Finish Modal Edit SLide -->

        </div>

    </div>

</div>

<script>
const Advertising = {
    data() {
        return {
            advertising: [],
            editLink: '',
            editImage: ''
        }
    },
    beforeMount(){
        this.all()
    },
    methods: {
        edit_advertising(ib) {
            event.preventDefault();
            var prom = this.advertising
            var e_item = prom[ib]
            var formDataEdit = new FormData($(`#formEditAdvertising${ib}`)[0]);
            $.ajax({
                type: "POST", //Метод отправки
                url: `/edit_tising/${e_item.id}`, //путь до php фаила отправителя
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
            var prom = this.advertising
            $.ajax({    
                type: "GET", 
                url: '/all_advertising',
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
Vue.createApp(Advertising).mount('#advertising')
</script>
@endsection