@extends('layouts.app')
@section('content')
<div class="nk-content-body">
  <div class="components-preview wide-md mx-auto">
    <div class="nk-block nk-block-lg">
      <h4 class="nk-block-title mt-3">Masukan Data Produksi</h4>
        <div class="nk-block-des mb-3">
          <div class="col-xxl-3 col-sm-6 d-flex">            
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</button>
            <button class="container-btn-file" data-bs-toggle="modal" data-bs-target="#exampleModalExcel">
               <svg
                 fill="#fff"
                 xmlns="http://www.w3.org/2000/svg"
                 width="30"
                 height="20"
                 viewBox="0 0 50 50"
               >
                 <path
                   d="M28.8125 .03125L.8125 5.34375C.339844 
                 5.433594 0 5.863281 0 6.34375L0 43.65625C0 
                 44.136719 .339844 44.566406 .8125 44.65625L28.8125 
                 49.96875C28.875 49.980469 28.9375 50 29 50C29.230469 
                 50 29.445313 49.929688 29.625 49.78125C29.855469 49.589844 
                 30 49.296875 30 49L30 1C30 .703125 29.855469 .410156 29.625 
                 .21875C29.394531 .0273438 29.105469 -.0234375 28.8125 .03125ZM32 
                 6L32 13L34 13L34 15L32 15L32 20L34 20L34 22L32 22L32 27L34 27L34 
                 29L32 29L32 35L34 35L34 37L32 37L32 44L47 44C48.101563 44 49 
                 43.101563 49 42L49 8C49 6.898438 48.101563 6 47 6ZM36 13L44 
                 13L44 15L36 15ZM6.6875 15.6875L11.8125 15.6875L14.5 21.28125C14.710938 
                 21.722656 14.898438 22.265625 15.0625 22.875L15.09375 22.875C15.199219 
                 22.511719 15.402344 21.941406 15.6875 21.21875L18.65625 15.6875L23.34375 
                 15.6875L17.75 24.9375L23.5 34.375L18.53125 34.375L15.28125 
                 28.28125C15.160156 28.054688 15.035156 27.636719 14.90625 
                 27.03125L14.875 27.03125C14.8125 27.316406 14.664063 27.761719 
                 14.4375 28.34375L11.1875 34.375L6.1875 34.375L12.15625 25.03125ZM36 
                 20L44 20L44 22L36 22ZM36 27L44 27L44 29L36 29ZM36 35L44 35L44 37L36 37Z"
                 ></path>
               </svg>
               Upload File
             </button>
          </div>
        </div>
        <div class="card card-bordered card-preview p-3">
          <table class="table datatable-init">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Kabupaten/Kota</th>
                <th class="text-center">Produksi 2019/Kw</th>
                <th class="text-center">Produksi 2020/Kw</th>
                <th class="text-center">Produksi 2021/Kw</th>
                <th class="text-center">Produksi 2022/Kw</th>
                <th class="text-center">Produksi 2023/Kw</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              {{-- @dd($produksis) --}}
              @foreach ($produksis as $item)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$item->namaKabKota}}</td>
                  <td>
                    @php
                    $value = $item->tahun1 / 1000;
                    @endphp
      
                    @if ($value >= 1)
                        {{ number_format($value, 3, '.', '.') }}
                    @else
                        {{ number_format($item->tahun1, 0, ',', '') }}
                    @endif
                  </td>
                  <td>
                    @php
                    $value = $item->tahun2 / 1000;
                    @endphp
      
                    @if ($value >= 1)
                        {{ number_format($value, 3, '.', '.') }}
                    @else
                        {{ number_format($item->tahun2, 0, ',', '') }}
                    @endif
                  </td>
                  <td>
                    @php
                    $value = $item->tahun3 / 1000;
                    @endphp
      
                    @if ($value >= 1)
                        {{ number_format($value, 3, '.', '.') }}
                    @else
                        {{ number_format($item->tahun3, 0, ',', '') }}
                    @endif
                  </td>
                  <td>
                    @php
                    $value = $item->tahun4 / 1000;
                    @endphp
      
                    @if ($value >= 1)
                        {{ number_format($value, 3, '.', '.') }}
                    @else
                        {{ number_format($item->tahun4, 0, ',', '') }}
                    @endif
                  </td>
                  <td>
                    @php
                    $value = $item->tahun5 / 1000;
                    @endphp
      
                    @if ($value >= 1)
                        {{ number_format($value, 3, '.', '.') }}
                    @else
                        {{ number_format($item->tahun5, 0, ',', '') }}
                    @endif
                  </td>
                  <td class="text-center">
                    <form action="{{ route('tanaman_delete', ['id' => $item->id]) }}" class="d-inline" method="POST" onsubmit="return confirm('Apakah ingin menghapus data ?')">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                    </form>
                    <a class='btn btn-warning btn-sm' type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">Edit</a>
                  </td>
                </tr>
                {{-- modal untuk edit --}}
                <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <form method="POST" action="{{ route('tanaman_update', ['id' => $item->id]) }}">
                            @csrf
                            <input type="hidden" value="{{ $tanamanId }}" name="idTanaman">
                            @method('PUT')
                              <select name="namaKabKota"class="form-select" aria-label="Default select example">
                                  <option selected>Kabupaten atau Kota</option>
                                  <option value="Konawe" {{$item->namaKabKota == 'Konawe' ? 'selected' : ''}} >Konawe</option>
                                  <option value="Konawe Selatan" {{$item->namaKabKota == 'Konawe Selatan' ? 'selected' : ''}}>Konawe Selatan</option>
                                  <option value="Kolaka" {{$item->namaKabKota == 'Kolaka' ? 'selected' : ''}}>Kolaka</option>
                                  <option value="Kolaka Utara" {{$item->namaKabKota == 'Kolaka Utara' ? 'selected' : ''}}>Kolaka Utara</option>
                                  <option value="Muna" {{$item->namaKabKota == 'Muna' ? 'selected' : ''}}>Muna</option>
                                  <option value="Buton" {{$item->namaKabKota == 'Buton' ? 'selected' : ''}}>Buton</option>
                                  <option value="Bombana" {{$item->namaKabKota == 'Bombana' ? 'selected' : ''}}>Bombana</option>
                                  <option value="Wakatobi" {{$item->namaKabKota == 'Wakatobi' ? 'selected' : ''}}>Wakatobi</option>
                                  <option value="Konawe Utara" {{$item->namaKabKota == 'Konawe Utara' ? 'selected' : ''}}>Konawe Utara</option>
                                  <option value="Buton Utara" {{$item->namaKabKota == 'Buton Utara' ? 'selected' : ''}}>Buton Utara</option>
                                  <option value="Kendari" {{$item->namaKabKota == 'Kendari' ? 'selected' : ''}}>Kendari</option>
                                  <option value="Bau-Bau" {{$item->namaKabKota == 'Bau-Bau' ? 'selected' : ''}}>Bau-Bau</option>
                                  <option value="Kolaka Timur" {{$item->namaKabKota == 'Kolaka Timur' ? 'selected' : ''}}>Kolaka Timur</option>
                                  <option value="Konawe Kepulauan" {{$item->namaKabKota == 'Konawe Kepulauan' ? 'selected' : ''}}>Konawe Kepulauan</option>
                                  <option value="Muna Barat" {{$item->namaKabKota == 'Muna Barat' ? 'selected' : ''}}>Muna Barat</option>
                                  <option value="Buton Tengah" {{$item->namaKabKota == 'Buton Tengah' ? 'selected' : ''}}>Buton Tengah</option>
                                  <option value="Buton Selatan" {{$item->namaKabKota == 'Buton Selatan' ? 'selected' : ''}}>Buton Selatan</option>
                                </select>
                              <div class="mb-3 row">
                                  <label for="inputT1" class="col-sm-5 col-form-label">Tahun 1 : </label>
                                  <div class="col-sm-6">
                                    <input type="number" class="form-control" name="tahun1" id="inputT1" value="{{$item->tahun1}}" >
                                  </div>
                              </div> 
                              <div class="mb-3 row">
                                  <label for="inputT2" class="col-sm-5 col-form-label">Tahun 2 : </label>
                                  <div class="col-sm-6">
                                    <input type="number" class="form-control"  name="tahun2" id="inputT2" value="{{$item->tahun2}}">
                                  </div>
                              </div> 
                              <div class="mb-3 row">
                                  <label for="inputT3" class="col-sm-5 col-form-label">Tahun 3 : </label>
                                  <div class="col-sm-6">
                                    <input type="number" class="form-control"  name="tahun3" id="inputT3" value="{{$item->tahun3}}">
                                  </div>  
                              </div> 
                              <div class="mb-3 row">
                                  <label for="inputT4" class="col-sm-5 col-form-label">Tahun 4 : </label>
                                  <div class="col-sm-6">
                                    <input type="number" class="form-control"  name="tahun4" id="inputT4" value="{{$item->tahun4}}">
                                  </div> 
                              </div> 
                              <div class="mb-3 row">
                                  <label for="inputT5" class="col-sm-5 col-form-label">Tahun 5 : </label>
                                  <div class="col-sm-6">
                                    <input type="number" class="form-control" name="tahun5" id="inputT5" value="{{$item->tahun5}}">
                                  </div>   
                              </div>    
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn btn-primary">Edit</button> 
                            </div>              
                          </form>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </tbody>
          </table>
        </div>  
    </div>
    <!-- Modal tambah -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Masukan Data</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form method="POST" action="{{ route('tanaman_store', $tanamanId) }}">
                @csrf
                <input type="hidden" value="{{ $tanamanId }}" name="idTanaman">
                <select name="namaKabKota" class="form-select" aria-label="Default select example" required>
                    <option value="">Kabupaten atau Kota</option>
                    <option value="Konawe">Konawe</option>
                    <option value="Konawe Selatan">Konawe Selatan</option>
                    <option value="Kolaka">Kolaka</option>
                    <option value="Kolaka Utara">Kolaka Utara</option>
                    <option value="Muna">Muna</option>
                    <option value="Buton">Buton</option>
                    <option value="Bombana">Bombana</option>
                    <option value="Wakatobi">Wakatobi</option>
                    <option value="Konawe Utara">Konawe Utara</option>
                    <option value="Buton Utara">Buton Utara</option>
                    <option value="Kendari">Kendari</option>
                    <option value="Bau-Bau">Bau-Bau</option>
                    <option value="Kolaka Timur">Kolaka Timur</option>
                    <option value="Konawe Kepulauan">Konawe Kepulauan</option>
                    <option value="Muna Barat">Muna Barat</option>
                    <option value="Buton Tengah">Buton Tengah</option>
                    <option value="Buton Selatan">Buton Selatan</option>
                  </select>
                  <div class="mb-3 row">
                      <label for="inputT1" class="col-sm-5 col-form-label">Tahun 1 : </label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" name="tahun1" id="inputT1" required>
                      </div>
                  </div> 
                  <div class="mb-3 row">
                      <label for="inputT2" class="col-sm-5 col-form-label">Tahun 2 : </label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control"  name="tahun2" id="inputT2" required>
                      </div>
                  </div> 
                  <div class="mb-3 row">
                      <label for="inputT3" class="col-sm-5 col-form-label">Tahun 3 : </label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control"  name="tahun3" id="inputT3" required>
                      </div>  
                  </div> 
                  <div class="mb-3 row">
                      <label for="inputT4" class="col-sm-5 col-form-label">Tahun 4 : </label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control"  name="tahun4" id="inputT4" required>
                      </div> 
                  </div> 
                  <div class="mb-3 row">
                      <label for="inputT5" class="col-sm-5 col-form-label">Tahun 5 : </label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" name="tahun5" id="inputT5" required>
                      </div>   
                  </div>    
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Tambah</button> 
                </div>              
              </form>
          </div>
        </div>
      </div>
    </div>  


    {{-- modal import excell --}}
    <div class="modal fade" id="exampleModalExcel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Masukan Data</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="modal-logo">
              <span class="logo-circle">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                  width="25"
                  height="25"
                  viewBox="0 0 512 419.116"
                >
                  <defs>
                    <clipPath id="clip-folder-new">
                      <rect width="512" height="419.116"></rect>
                    </clipPath>
                  </defs>
                  <g id="folder-new" clip-path="url(#clip-folder-new)">
                    <path
                      id="Union_1"
                      data-name="Union 1"
                      d="M16.991,419.116A16.989,16.989,0,0,1,0,402.125V16.991A16.989,16.989,0,0,1,16.991,0H146.124a17,17,0,0,1,10.342,3.513L227.217,57.77H437.805A16.989,16.989,0,0,1,454.8,74.761v53.244h40.213A16.992,16.992,0,0,1,511.6,148.657L454.966,405.222a17,17,0,0,1-16.6,13.332H410.053v.562ZM63.06,384.573H424.722L473.86,161.988H112.2Z"
                      fill="var(--c-action-primary)"
                      stroke=""
                      stroke-width="1"
                    ></path>
                  </g>
                </svg>
              </span>
            </div>
          </div>
          <div class="modal-body">
            <form action="{{ route('import-excel', $tanamanId) }}" method="POST" enctype="multipart/form-data" id="uploadForm">
              @csrf
              <p class="modal-title">Upload a file</p>
              <p class="modal-description">Attach the file below</p>
              <button class="upload-area" type="button" onclick="document.getElementById('fileInput').click()">
                <span class="upload-area-icon">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    width="35"
                    height="35"
                    viewBox="0 0 340.531 419.116"
                  >
                    <g id="files-new" clip-path="url(#clip-files-new)">
                      <path
                        id="Union_2"
                        data-name="Union 2"
                        d="M-2904.708-8.885A39.292,39.292,0,0,1-2944-48.177V-388.708A39.292,39.292,0,0,1-2904.708-428h209.558a13.1,13.1,0,0,1,9.3,3.8l78.584,78.584a13.1,13.1,0,0,1,3.8,9.3V-48.177a39.292,39.292,0,0,1-39.292,39.292Zm-13.1-379.823V-48.177a13.1,13.1,0,0,0,13.1,13.1h261.947a13.1,13.1,0,0,0,13.1-13.1V-323.221h-52.39a26.2,26.2,0,0,1-26.194-26.195v-52.39h-196.46A13.1,13.1,0,0,0-2917.805-388.708Zm146.5,241.621a14.269,14.269,0,0,1-7.883-12.758v-19.113h-68.841c-7.869,0-7.87-47.619,0-47.619h68.842v-18.8a14.271,14.271,0,0,1,7.882-12.758,14.239,14.239,0,0,1,14.925,1.354l57.019,42.764c.242.185.328.485.555.671a13.9,13.9,0,0,1,2.751,3.292,14.57,14.57,0,0,1,.984,1.454,14.114,14.114,0,0,1,1.411,5.987,14.006,14.006,0,0,1-1.411,5.973,14.653,14.653,0,0,1-.984,1.468,13.9,13.9,0,0,1-2.751,3.293c-.228.2-.313.485-.555.671l-57.019,42.764a14.26,14.26,0,0,1-8.558,2.847A14.326,14.326,0,0,1-2771.3-147.087Z"
                        transform="translate(2944 428)"
                        fill="var(--c-action-primary)"
                      ></path>
                    </g>
                  </svg>
                </span>
                <span class="upload-area-title">Drag file(s) here to upload.</span>
                <span class="upload-area-description">
                  Alternatively, you can select a file by <br /><strong>clicking here</strong>
                </span>
              </button>
              <input type="file" id="fileInput" style="display:none" name="file" />
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn-secondary">Cancel</button>
            <button class="btn-primary2" type="button" onclick="document.getElementById('uploadForm').submit()">Upload File</button>
          </div>
        </div>
      </div>
    </div>
  </div> 
</div> 

<style>
  .container-btn-file {
  display: flex;
  position: relative;
  justify-content: center;
  align-items: center;
  background-color: #307750;
  color: #fff;
  border-style: none;
  padding: 10px;
  border-radius: 5px;
  overflow: hidden;
  z-index: 1;
  box-shadow: 4px 8px 10px -3px rgba(0, 0, 0, 0.356);
  transition: all 250ms;
  margin-left: 10px
}
.container-btn-file input[type="file"] {
  position: absolute;
  width: 100%;
  height: 100%;
  opacity: 0;
  cursor: pointer;
}
.container-btn-file > svg {
  margin-right: 1em;
}
.container-btn-file::before {
  content: "";
  position: absolute;
  height: 100%;
  width: 0;
  border-radius: 0.5em;
  background-color: #469b61;
  z-index: -1;
  transition: all 350ms;
}
.container-btn-file:hover::before {
  width: 100%;
} 
.logo-circle {
  width: 3.5rem;
  height: 3.5rem;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
  background-color: #e9e5ff;
  fill: #1cc972;
}
.modal-title {
  font-weight: 700;
}
.modal-description {
  color: #6a6b76;
}
.upload-area {
  margin-top: 1.25rem;
  background-color: transparent;
  padding: 3rem;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  border: 1px dashed #6a6b76;
}
.upload-area:hover,
.upload-area:focus {
  cursor: pointer;
  border: 1px solid #6a6b76;
}
.upload-area:hover .upload-area-icon,
.upload-area:focus .upload-area-icon {
  transform: scale(1.3);
  transition-duration: 0.3s;
}
.upload-area-icon {
  display: block;
  width: 2.25rem;
  height: 2.25rem;
  fill: #1cc972;
}

.upload-area-title {
  margin-top: 1rem;
  display: block;
  font-weight: 700;
  color: #0d0f21;
}
.upload-area-description {
  display: block;
  color: #6a6b76;
}
.upload-area-description strong {
  color: #1cc972;
  font-weight: 700;
}
.modal-footer {
  padding: 1rem 1.5rem 1.5rem;
  display: flex;
  justify-content: flex-end;
}
.modal-footer [class*="btn-"] {
  margin-left: 0.75rem;
}
.btn-secondary,
.btn-primary2 {
  padding: 0.5rem 1rem;
  font-weight: 500;
  border: 2px solid #e5e5e5;
  border-radius: 0.25rem;
  background-color: transparent;
  cursor: pointer;
}
.btn-primary2 {
  color: #fff;
  background-color: #1cc972;
  border-color: #1cc972;
  cursor: pointer;
}
#fileInput {
  display: none;
}
</style>

<script>
  document.querySelector('.upload-area').addEventListener('click', function() {
  document.getElementById('fileInput').click();
});
</script>
@endsection