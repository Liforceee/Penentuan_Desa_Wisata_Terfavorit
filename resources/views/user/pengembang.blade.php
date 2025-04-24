@extends('layout_user.index')

@section('main')
<!-- Team Section -->
<section id="team" class="team section light-background py-5">
    <div class="container">
      <!-- Section Title -->
      <div class="section-title text-center" data-aos="fade-up">
        <h2>Team</h2>
        <p><span>Pengembang</span></p>
      </div><!-- End Section Title -->

      <div class="row justify-content-center gy-4">
        <!-- Team Members -->
        @php
          $teamMembers = [
            ['name' => 'Budi Anggoro Sajiwo Putro', 'role' => '21330026', 'image' => 'foto01.png', 'facebook' => 'https://www.facebook.com/anggoro.sajiwo.3', 'instagram' => 'https://www.instagram.com/liforcee'],
            ['name' => 'Yumarlin Mz', 'role' => 'Dosen Informatika UJB', 'image' => 'foto02.png', 'facebook' => 'https://www.facebook.com/profile.php?id=100009845284866', 'instagram' => 'https://www.instagram.com/marlinmz73/'],
            ['name' => 'Jemmy Edwin Bororing', 'role' => 'Dosen Informatika UJB', 'image' => 'foto3.png', 'facebook' => 'https://www.facebook.com/jemmy.bororing', 'instagram' => 'https://www.instagram.com/jemmyedwinbororing/']
          ];
        @endphp

        @foreach ($teamMembers as $index => $member)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="{{ 100 * ($index + 1) }}">
          <div class="team-member shadow-sm rounded text-center p-3 bg-white">
            <div class="member-img position-relative">
              <img src="{{ asset('user/assets/img/team/' . $member['image']) }}" class="img-fluid rounded-circle" alt="">
              <div class="social position-absolute top-0 start-50 translate-middle-x mt-2">
                <a href="{{ $member['facebook'] }}" target="_blank"><i class="bi bi-facebook"></i></a>
                <a href="{{ $member['instagram'] }}" target="_blank"><i class="bi bi-instagram"></i></a>
              </div>
            </div>
            <div class="member-info mt-3">
              <h5 class="mb-1">{{ $member['name'] }}</h5>
              <small class="text-muted">{{ $member['role'] }}</small>
            </div>
          </div>
        </div><!-- End Team Member -->
        @endforeach
      </div>
    </div>
  </section><!-- /Team Section -->
@endsection
