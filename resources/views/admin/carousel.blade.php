@extends('admin.layout_panel')
@section('admin_content')
<div class="container mt-2">
    <div class="pagetitle">
        <div class="d-flex">
            <div>
                <h1>Карусель</h1>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="/admin_home" class="text-decoration-none">Главная</a></li>
                        <li class="breadcrumb-item active">Карусель</li>
                    </ol>
                </nav>
            </div>
            <button class="btn bg-darkblue ms-auto" data-bs-toggle="modal" data-bs-target="#addcarousel"><i class="bi bi-plus-lg fs-5"></i></button>
        </div>
    </div>
    
    <div class="d-flex flex-column mt-3">
        @foreach($carousel as $item)
            <div class="d-flex flex-column bg-white shadow-sm px-3 py-2">
                <div class="d-flex">
                    <h3>{{$item->name}}</h3>
                    <div class="btn-group dropstart btn-setting-profile ms-auto" style="position: relative; bottom: 6px;">
                        <button type="button" class="btn px-1 py-1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots fs-5"></i>
                        </button>
                        <ul class="dropdown-menu drop-position">
                            <li><a href="#" class="dropdown-item" type="button"  data-bs-toggle="modal" data-bs-target="#editcarousel{{$item->id}}">Редактировать</a></li>
                            <li><a href="#" class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#deletecarousel{{$item->id}}">Удалить</a></li>
                        </ul>
                    </div>
                </div>
                <img class="rounded-3" style="height: 120px;" src="/storage/carousel/{{$item->image}}" alt="...">
            </div>

            `<!-- Modal Edit Carousel -->
            <div class="modal fade" id="editcarousel{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex border-0">
                            <h3 class="modal-title ms-auto" id="exampleModalLabel">Редактирование карточки</h3>
                            <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/edit_carousel/{{$item->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div>
                                    <label>Выберите фото</label>
                                    <input type="file" name="image" class="form-control mt-1">
                                    @if($errors->has('image'))
                                        {{$errors->first('image')}}
                                    @endif
                                </div>

                                <div class="form-floating mt-2">
                                    <input type="text" name="name" value="{{$item->name}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Название карточки</label>
                                    @if($errors->has('name'))
                                        {{$errors->first('name')}}
                                    @endif
                                </div>

                                <div class="form-floating mt-2">
                                    <input type="text" name="first_text" value="{{$item->first_text}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Первый текст</label>
                                    @if($errors->has('first_text'))
                                        {{$errors->first('first_text')}}
                                    @endif
                                </div>

                                <div class="form-floating mt-2">
                                    <input type="text" name="description" value="{{$item->description}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Описание</label>
                                    @if($errors->has('description'))
                                        {{$errors->first('description')}}
                                    @endif
                                </div>

                                <div class="form-floating mt-2">
                                    <input type="text" name="text_price" value="{{$item->text_price}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Текст цены</label>
                                    @if($errors->has('text_price'))
                                        {{$errors->first('text_price')}}
                                    @endif
                                </div>

                                <div class="form-floating mt-2">
                                    <input type="text" name="price" value="{{$item->price}}"  class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Цена</label>
                                    @if($errors->has('price'))
                                        {{$errors->first('price')}}
                                    @endif
                                </div>

                                <button class="btn btn-lg bg-darkblue mt-2 w-100">Сохранить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal delete carousel -->
            <div class="modal fade" id="deletecarousel{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="d-flex flex-column">
                                <h4>Подтверждение</h4>
                                <div>Вы действительно хотите удалить эту категорию? Отменить это действие будет невозможно</div>
                                <div class="d-flex gap-3 ms-auto mt-1">
                                    <a href="/delete_carousel/{{$item->id}}" class="text-dark py-2 px-1">Да</a>
                                    <button class="btn px-1" data-bs-dismiss="modal">Нет</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

<!-- Modal Add Carousel -->
<div class="modal fade" id="addcarousel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header d-flex border-0">
        <h3 class="modal-title ms-auto" id="exampleModalLabel">Добавление карточки</h3>
        <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/add_carousel" method="POST" enctype="multipart/form-data">
        @csrf
            <div>
                <label>Выберите фото</label>
                <input type="file" name="image" class="form-control mt-1">
                @if($errors->has('image'))
                    {{$errors->first('image')}}
                @endif
            </div>

            <div class="form-floating mt-2">
                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Название карточки</label>
                @if($errors->has('name'))
                    {{$errors->first('name')}}
                @endif
            </div>

            <div class="form-floating mt-2">
                <input type="text" name="first_text" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Первый текст</label>
                @if($errors->has('first_text'))
                    {{$errors->first('first_text')}}
                @endif
            </div>

            <div class="form-floating mt-2">
                <input type="text" name="description" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Описание</label>
                @if($errors->has('description'))
                    {{$errors->first('description')}}
                @endif
            </div>

            <div class="form-floating mt-2">
                <input type="text" name="text_price" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Текст цены</label>
                @if($errors->has('text_price'))
                    {{$errors->first('text_price')}}
                @endif
            </div>

            <div class="form-floating mt-2">
                <input type="text" name="price" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Цена</label>
                @if($errors->has('price'))
                    {{$errors->first('price')}}
                @endif
            </div>

            <button class="btn btn-lg bg-darkblue mt-2 w-100">Добавить</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection