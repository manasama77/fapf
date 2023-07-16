@extends('landing_theme')

@section('aku_isi_mas')
    @include('partials.landing.style2')

    <section class="form">
        <div class="testbox">
            <form method="POST" action="{{ route('job-apply.store', $id) }}" enctype="multipart/form-data">
                @csrf
                <div class="banner">
                    <h1>
                        EMPLOYMENT APPLICATION FORM<br />
                        <span class="text-posisi"><?= $job_lists->kode_jabatan ?> - <?= $job_lists->nama_jabatan ?></span>
                    </h1>
                </div>
                </br>

                @if ($errors->any())
                    <span class="text-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </ul>
                    </span>
                @endif

                <br />
                <h4>I. Biographical </h4>

                <div class="colums">
                    <div class="item">
                        <label for="fname"> First Name<span>*</span></label>
                        <input id="fname" type="varchar" name="fname" value="{{ old('fname') }}" required />
                    </div>

                    <div class="item">
                        <label for="lname"> Last Name<span>*</span></label>
                        <input id="lname" type="varchar" name="lname" value="{{ old('lname') }}" required />
                    </div>

                    <div class="item">
                        <label for="jk">Sex<span>*</span></label>
                        <select name="jk" required>
                            <option value=""></option>
                            <option {{ old('jk') == 'Male' ? 'selected' : null }} value="Male">Male</option>
                            <option {{ old('jk') == 'Female' ? 'selected' : null }} value="Female">Female</option>
                        </select>
                    </div>

                    <div class="item">
                        <label for="national">Nationality<span>*</span></label>
                        <select name="national" required>
                            <option value=""></option>
                            <option {{ old('national') == 'WNI' ? 'selected' : null }} value="WNI">Warga Negara Indonesia
                            </option>
                            <option {{ old('national') == 'WNA' ? 'selected' : null }} value="WNA">Warga Negara Asing
                            </option>
                        </select>
                    </div>


                    <div class="item">
                        <label for="tempat_lahir"> Place Of Birth<span>*</span></label>
                        <input id="tempat_lahir" type="varchar" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                            required />
                    </div>
                    <div class="item">
                        <label for="tgl_lahir">Date Of Birth<span>*</span></label>
                        <input id="tgl_lahir" type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}"
                            max="{{ $max_dob->format('Y-m-d') }}" required />
                    </div>

                </div>

                <div class="colums">
                    <div class="item">
                        <label for="alamat">Current Address<span>*</span></label>
                        <input id="alamat" type="varchar" name="alamat" value="{{ old('alamat') }}" required />
                    </div>
                    <div class="item">
                        <label for="email">Email <span>*</span></label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required />
                    </div>

                    <div class="item">
                        <label for="hp">Mobile Number<span>*</span></label>
                        <input id="hp" type="number" name="hp" value="{{ old('hp') }}" required />
                    </div>
                </div>



                <h4>II. Education Background</h4>

                <div class="colums2">

                    <div class="item">
                        <label for="pendidikan">Highest Education Degree<span>*</span></label>
                        <select name="pendidikan" required>
                            <option value=""></option>
                            <option {{ old('pendidikan') == 'SMA/SMK/Sederajat' ? 'selected' : null }}
                                value="SMA/SMK/Sederajat">SMA/SMK/Sederajat</option>
                            <option {{ old('pendidikan') == 'D1' ? 'selected' : null }} value="D1">D1</option>
                            <option {{ old('pendidikan') == 'DIII' ? 'selected' : null }} value="DIII">DIII</option>
                            <option {{ old('pendidikan') == 'S1/DIV' ? 'selected' : null }} value="S1/DIV">S1/DIV</option>
                            <option {{ old('pendidikan') == 'S2' ? 'selected' : null }} value="S2">S2</option>
                            <option {{ old('pendidikan') == 'S3' ? 'selected' : null }} value="S3">S3</option>
                        </select>
                    </div>

                    <div class="item">
                        <label for="jurusan">Major<span>*</span></label>
                        <input id="jurusan" type="varchar" name="jurusan" value="{{ old('jurusan') }}" required />
                    </div>
                    <div class="item">
                        <label for="ipk">GPA/IPK<span>*</span></label>
                        <input id="ipk" type="number" name="ipk" value="{{ old('ipk') }}" min="1"
                            max="4" step="0.1" required />
                    </div>
                    <div class="item">
                        <label for="max_ipk">Max GPA/IPK<span>*</span></label>
                        <input id="max_ipk" type="number" name="max_ipk" value="{{ old('max_ipk') }}" min="1"
                            max="4" step="0.1" required />
                    </div>
                </div>

                <div class="colums2">
                    <div class="item">
                        <label for="status_universitas">Status Universitas<span>*</span></label>
                        <select name="status_universitas" required>
                            <option value=""></option>
                            <option {{ old('status_universitas') == '1' ? 'selected' : null }} value="1">Negeri
                            </option>
                            <option {{ old('status_universitas') == '2' ? 'selected' : null }} value="2">Swasta
                            </option>
                        </select>
                    </div>
                    <div class="item">
                        <label for="lokasi_univ">Lokasi Universitas<span>*</span></label>
                        <select name="lokasi_univ" required>
                            <option value=""></option>
                            <option {{ old('lokasi_univ') == '1' ? 'selected' : null }} value="1">Indonesia</option>
                            <option {{ old('lokasi_univ') == '2' ? 'selected' : null }} value="2">Luar Negeri
                            </option>
                        </select>
                    </div>
                    <div class="item">
                        <label for="jurusan_sawit">Jurusan berkaitan dengan Sawit?<span>*</span></label>
                        <select name="jurusan_sawit" required>
                            <option value=""></option>
                            <option {{ old('jurusan_sawit') == 'Y' ? 'selected' : null }} value="Y">Yes</option>
                            <option {{ old('jurusan_sawit') == 'N' ? 'selected' : null }} value="N">No</option>
                        </select>
                    </div>
                </div>

                </br>


                <h4><b> III. Job Experiences </b></h4>

                <div class="colums2">
                    <div class="item">
                        <label for="pengalaman">Tahun Pengalaman Kerja<span>*</span></label>
                        <input id="pengalaman" type="number" name="pengalaman" value="{{ old('pengalaman') }}"
                            required />
                    </div>

                    <div class="item">
                        <label for="pengalaman_kebun">Tahun Pengalaman Kerja di Perkebunan<span>*</span></label>
                        <input id="pengalaman_kebun" type="number" name="pengalaman_kebun"
                            value="{{ old('pengalaman_kebun') }}" required />
                    </div>

                    <div class="item">
                        <label for="lokasi_kalimantan">Bersedia ditempatkan di Kalimantan<span>*</span></label>
                        <select name="lokasi_kalimantan" required>
                            <option value=""></option>
                            <option {{ old('lokasi_kalimantan') == 'Yes' ? 'seleted' : null }} value="Yes">Yes</option>
                            <option {{ old('lokasi_kalimantan') == 'No' ? 'seleted' : null }} value="No">No</option>
                        </select>
                    </div>
                </div>


                <div class="colums">
                    <div class="item">
                        <label for="file_cv"> Upload Your CV </label> </br>
                        <p style="font-style: italic; color: red;">*Maximum upload 3MB (pdf)</p>
                        <input type="file" id="file" name="file" accept="application/pdf" required>
                    </div>
                    <div class="item">
                        <label for="file_cv"> Upload Your Application Letter </label> </br>
                        <p style="font-style: italic; color: red;">Maximum upload 3MB (docx,pptx,pdf)</p>
                        <input type="file" id="file_surat" name="file_surat"
                            accept="application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.presentationml.slideshow, application/vnd.openxmlformats-officedocument.presentationml.presentation"
                            required>
                    </div>
                </div>

                <h2 class="mt-5">Applicants Agreements</h2>
                <input type="checkbox" name="checkbox1">
                <label>
                    <li>I certify that information contained in this application is true and complete
                    </li>
                    <li>I understand that false information may be grounds for not hiring me and for immediate
                    </li>
                    <li>terimnation of employment at any point in the future if I am hired
                    </li>
                    <li>I authorize the veifircation of all of information listed above
                    </li>

                </label>
                <div class="btn-block">
                    <button type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
