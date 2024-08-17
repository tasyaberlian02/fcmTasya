<div class="nk-sidebar-element">
    <div class="nk-sidebar-content">
        <div class="nk-sidebar-menu" data-simplebar>
            <ul class="nk-menu">
                <li class="nk-menu-heading">
                    <h6 class="overline-title text-primary-alt" style="font-size: 14px; font-weight: bolder; color: white">Jenis Tanaman</h6>
                </li><!-- .nk-menu-item -->
                @foreach ($tanaman as $item)
                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                        <span class="nk-menu-icon"><em class="icon ni ni-layers-fill"></em></span>
                        <span class="nk-menu-text">{{ $item->namaTanaman }}</span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="{{$item->id}}/data_produksi" class="nk-menu-link"><span class="nk-menu-text">Data Produksi</span></a>
                            <a href="/hasil/{{$item->id}}" class="nk-menu-link"><span class="nk-menu-text">Hasil</span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>            