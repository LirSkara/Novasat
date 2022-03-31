@extends('admin.layout_panel')
@section('admin_content')
<div class="container-fluid mt-3">
  <div class="d-flex flex-column">
    <div class="d-flex flex-column bg-light shadow py-3 px-3">
        <div class="d-flex">
          <div class="fs-5">Купили сегодня | 1548</div><span class="mt-1 ms-1">товаров</span>
          <div class="btn-group dropstart btn-setting-profile ms-auto" style="position: relative; bottom: 6px;">
            <button type="button" class="btn px-1 py-1" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-three-dots fs-5"></i>
            </button>
            <ul class="dropdown-menu drop-position">
                <li><a href="/" class="dropdown-item" type="button">Выйти</a></li>
            </ul>
          </div>
        </div>
        <div class="d-flex">
          <div><i class="bi bi-cart"></i></div>
        </div>
    </div>
  </div>
</div>
@endsection