@extends('layouts.main_main')
@section('content')
<div class="banner">


    {{-- header --}}
    @include('includes.header_for_main')
    {{-- header --}}


    <section class="section__banner">
      <div class="section__our-items__list container-lg">
        <div class="row"> 
          <div class="col"> 
            <div class="section__our-items__list__card">
              <div class="section__our-items__list__card__title">
                <h5>Физика</h5>
              </div>
            </div>
          </div>
          <div class="col"> 
            <div class="section__our-items__list__card">
              <div class="section__our-items__list__card__title">
                <h5>Адаб</h5>
              </div>
            </div>
          </div>
          <div class="col"> 
            <div class="section__our-items__list__card">
              <div class="section__our-items__list__card__title">
                <h5>Таджвид</h5>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col"> 
            <div class="section__our-items__list__card">
              <div class="section__our-items__list__card__title">
                <h5>Акыда</h5>
              </div>
            </div>
          </div>
          <div class="col"> 
            <div class="section__our-items__list__card">
              <div class="section__our-items__list__card__title">
                <h5>Сира</h5>
              </div>
            </div>
          </div>
          <div class="col"> 
            <div class="section__our-items__list__card">
              <div class="section__our-items__list__card__title">
                <h5>Математика</h5>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col"> 
            <div class="section__our-items__list__card">
              <div class="section__our-items__list__card__title">
                <h5>Арабский</h5>
              </div>
            </div>
          </div>
          <div class="col"> 
            <div class="section__our-items__list__card">
              <div class="section__our-items__list__card__title">
                <h5>История</h5>
              </div>
            </div>
          </div>
          <div class="col"> 
            <div class="section__our-items__list__card">
              <div class="section__our-items__list__card__title">
                <h5>Химия</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-lg">
          <div class="footer__info">
            <h5 class="footer__info__title">МИР ВАМ И БЛАГОСЛОВЕНИЕ ВСЕВЫШНЕГО!</h5>
            <div class="footer__info__social"><a class="social-site" href="#"><i class="fa-brands fa-instagram"></i></a><a class="social-site" href="#"><i class="fa-brands fa-twitter"></i></a><a class="social-site" href="#"><i class="fa-brands fa-vk"></i></a><a class="social-site" href="#"><i class="fa-brands fa-telegram"></i></a></div>
            <div class="footer__info__bottom__text">
              <p>© 2021 - 2022 Исламский институт  имени “Расула-Акрама”</p>
            </div>
          </div>
        </div>
      </footer>
    </section>

</div>
    @endsection

