@extends('layouts.main_main')
@section('content')
<div class="banner">

     {{-- header --}}
     @include('includes.header_for_main')
     {{-- header --}}

</div>
  
        <div class="container-lg mt-5">
            @if ($set_button)
            @include('includes.application_form')
            @endif

          </div>


<div class="container-lg">
@if(session('notification'))
        <div class="alert alert-light" role="alert" style="font-size: 16px; background-color: #f3ebf3;" id="notification">
            <ul>
                <li>{{session('notification')}}</li>
            </ul>
        </div>
        @endif
        <div class="section__gender">
          <h5 class="section__gender__title">Образ мусульманки</h5><img class="section__gender__img" src="https://medina-center.ru/wp-content/uploads/2015/10/1-4.jpg" alt="#">
          <p class="section__gender__sub-title mt-4">Ислам — религия любви, добра, мира и чистоты. Он затрагивает темы  поведения женщины по отношению к своему Господу, в обществе, в семье и к самой себе.<br><br>Нравом мусульманки также должен быть Коран — Мудрая Книга Аллаха. Её личность должна быть воплощением Священного Корана и Пречистой Сунны. Мусульманка должна служить примером для окружающих людей и для членов своей семьи, в том числе и для своих детей.<br><br>Большинство великих мужчин, чьи имена остались на страницах исламской истории, стали таковыми благодаря своим матерям. Они впитали с молоком матери благородство её души и её безупречный нрав — нрав, который появился благодаря искренней вере в Создателя и неуклонному следованию Корану и Сунне.</p>
          <h5 class="section__gender__title mt-5">Мусульманка со своим Господом</h5><img class="section__gender__img" src="http://media.islamicity.org/wp-content/uploads/2019/04/iStock-177341271.jpg" alt="#">
          <p class="section__gender__sub-title mt-4">Мусульманку отличает глубокая вера в Аллаха и убеждённость в том, что всё в мире происходит исключительно по воле Аллаха и Его предопределению. Она знает: постигшее людей не могло обойти их стороной, а обошедшее их стороной не могло постигнуть их. И она понимает, что предназначение человека в этом мире — вершить добрые дела, всецело уповая на Аллаха.<br><br>Мусульманка никогда не забывает о том, что человек постоянно нуждается в помощи и содействии Всевышнего и наставлении на истинный путь и что цель его земной жизни — снискать довольство Создателя.<br><br>История Хаджар (Агарь) — прекрасный пример глубокой веры и искреннего упования на Аллаха. Ибрахим (Авраам) оставил её одну с грудным младенцем на руках в окрестностях современной Мекки. В то время там была безводная и безжизненная пустыня, однако Хаджар не испугалась и не впала в отчаяние. Она лишь спросила: «Аллах повелел тебе сделать это, о Ибрахим?» Он ответил: «Да». И она сказала со смирением и довольством: «Значит, Он не оставит нас» [Бухари]. <br><br>Попробуйте представить себя на месте Хаджар: совершенно одна с грудным ребёнком в пустыне, и нет ничего, кроме корзины фиников и небольшого бурдюка с водой. Если бы не вера и упование на Аллаха, она не смогла бы перенести это тяжкое испытание и страх парализовал бы её в первые же мгновения после ухода Ибрахима. Эту стойкую женщину вспоминают паломники, которые бегают между холмами Сафа и Марва, как бегала когда-то она в надежде увидеть людей и спасти умирающего от жажды маленького сына. И они вспоминают её всякий раз, как пьют воду из источника Замзам, который когда-то забил для неё в пустыне по воле Всевышнего Аллаха…<br><br>Женщина-мусульманка старается походить на отважную Хаджар и брать с неё пример. Вера — спасительная веха в гибельной пустыне для сбившегося с пути или блуждающего во тьме и утешение для каждого опечаленного.<br><br>Ислам делает мусульманку совестливой и богобоязненной, и она избегает грехов и не отклоняется от прямого пути ни при людях, ни в одиночестве. Она знает: где бы она ни была и что бы ни делала, Аллах видит и слышит её. Это и есть истинная вера и её прекрасный плод, который возвышает человека до уровня добродетельности (ихсан). <br><br>Мусульманка никогда не забывает о грядущем Дне воздаяния и страшится его, а потому старается быть покорной своему Господу, благодарить его и запасаться благими делами.</p>
          <h5 class="section__gender__title mt-5">Мусульманка с самой собой</h5><img class="section__gender__img" src="https://auroville.ru/wp-content/uploads/2019/11/63585952570.jpg" alt="#">
          <p class="section__gender__sub-title mt-4">Ислам побуждает своих последователей служить благим примером для остальных людей, бескорыстно делать добро и выделяться своим благонравием, нравственной чистотой и благородными поступками.<br><br>Ислам требует от мусульманина содержать тело и одежду в чистоте, быть всегда аккуратным и опрятным и вызывать расположение к себе, а не отталкивать своим внешним видом. И его требования относятся к женщине в большей степени, чем к мужчине, потому что её внешний вид оказывает немалое влияние на супружескую жизнь и поведение детей, которые проводят с ней большую часть времени.<br><br>Следовательно, женщина должна заботиться о своём внешнем виде и не забывать о чистоте и опрятности даже в круговороте ежедневных хлопот. Забота мусульманки о своём внешнем виде указывает на правильность её представления о том, какой должна быть женщина, исповедующая ислам.<br><br>Сознательная мусульманка понимает, что человек состоит из тела, разума и духа, и старается поддерживать гармоничное равновесие между этими тремя составляющими. Она не уделяет чрезмерное внимание одной, забывая о другой, потому что ислам научил её придерживаться умеренности и всегда и во всём стремиться к золотой середине.</p>
          <h5 class="section__gender__title mt-5">Мусульманка со своим мужем</h5><img class="section__gender__img" src="https://islam.ru/sites/default/files/img/2016/obshestvo/semya11.jpg" alt="#">
          <p class="section__gender__sub-title mt-4">Брак в исламе — благословенный союз мужчины и женщины, делающий их  дозволенными друг для друга. После заключения брака начинается их совместная жизнь. Супруги-мусульмане живут в любви и согласии, находя успокоение друг у друга, и плодотворно трудятся вместе, помогая друг другу творить историю семьи. О семейном союзе прекрасно сказано в Книге Всевышнего Аллаха: Среди Его знамений — то, что Он сотворил из вас самих жён для вас, чтобы вы находили у них успокоение, и установил между вами любовь и милосердие. Воистину, в этом — знамения для людей размышляющих. Сура 30 «Румы», аят 21<br><br>Супружество — прочная нить, которой Всевышний Аллах связывает два сердца, рождая в них взаимную любовь. В мусульманской семье царит взаимопонимание и всегда ощущается искреннее стремление помочь друг другу. Эта семья живёт по законам Всевышнего, и дочери и сыновья, которые воспитываются в ней, с детства любят ислам и много знают о нём. Они получают достойное воспитание, причём особое внимание родители уделяют их нравственности, стараясь вложить в них все достоинства, которыми должен обладать истинный мусульманин, и обучая их нормам исламского этикета. Мусульманская семья — активная и сплочённая. Её члены не представляют свою жизнь без созидательного труда. Они помогают друг другу в благочестии и богобоязненности и стремятся опередить друг друга в совершении благих дел. Поэтому мусульманская семья — надёжный кирпичик в огромном здании мусульманского общества.<br><br>А праведная женщина — опора мусульманской семьи и её прочное основание, и важность роли, которую она играет в семье, трудно переоценить. Вспомним слова Посланника Аллаха : «Мир этот даётся во временное пользование, и лучшее из того, что можно приобрести в нём, — это праведная жена» [Муслим]. Праведная жена — дар Всевышнего, который мужчина должен ценить, потому что праведность, богобоязненность и обычно сопутствующее им благонравие женщины обеспечивают всей семье спокойную, счастливую и благополучную жизнь и предотвращают конфликты и многие другие возможные неприятности. Что же должна делать мусульманка для того, чтобы стать «лучшим из того, что можно приобрести в этом мире» — праведной женой — и заслужить любовь и уважение членов своей семьи? Об этом мы поговорим на следующих страницах.</p>
          <h5 class="section__gender__title mt-5 mb-5">Мусульманка со своими детьми</h5><img class="section__gender__img" src="https://thumbs.dreamstime.com/b/мусульманская-мама-в-hijab-читает-ее-маленькую-дочь-книга-сидя-на-софе-147591873.jpg" alt="#">
          <p class="section__gender__sub-title mt-4">Дети — сокровища наших сердец и отрада наших глаз. Источник нашего счастья и украшение нашей жизни. Мы связываем с ними надежды и мечтаем, чтобы они выросли искренне верующими, праведными, добрыми, здоровыми и счастливыми. «Румы», аят 21<br><br>Дети — сокровища наших сердец и отрада наших глаз. Источник нашего счастья и украшение нашей жизни. Мы связываем с ними надежды и мечтаем, чтобы они выросли искренне верующими, праведными, добрыми, здоровыми и счастливыми.<br>Однако для того, чтобы дети выросли такими, какими желают видеть их родители, они должны получить хорошее воспитание, которое позволит им занять достойное место в жизни и стать полезными членами общества. Лишь в этом случае они смогут созидательно трудиться и приносить благо своим родителям и другим людям. Только дети, получившие хорошее воспитание, будут соответствовать описанию Всевышнего: «Богатство и сыновья — украшение мирской жизни…» (сура 18 «Пещера», аят 46).<br><br>Если же их воспитанием никто не занимался и родители не уделяли им должного внимания и не заботились о них, то они, став взрослыми, не принесут своим родителям и обществу ничего, кроме зла и горя. </p>
        </div>
      </div>
    <section class="section__content">
        <div class="container-lg">
            @if ($set_button)
            @include('includes.application_form')
            @endif

          </div>
    </section>
    <script type="text/javascript">
      var notification = document.getElementById('notification');
      if(notification){
          var timer = setInterval(timerFunction, 1000);
          var count = 0;
          function timerFunction() {
              count++;
              if(count > 5){
                  notification.className = "d-none";
                  clearInterval(timer);
              }
          }
      }
    </script>

    @endsection
