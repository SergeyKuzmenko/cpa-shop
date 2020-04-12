<!DOCTYPE html>
<html lang="{{$main_og_locale}}">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <script src="{{ asset('public/js/jquery.min.js') }}"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta content="telephone=no" name="format-detection"/>
  <meta name="csrf-token" content="{{ csrf_token() }}"/>
  <title>{{ $main_title }}</title>
  <meta name="description" content="{{ $main_description }}">
  <meta name="keywords" content="{{ $main_keywords }}">
  <link href="{{ asset('public/img/favicon.png') }}" rel="shortcut icon" type="image/x-icon"/>
  <link href="{{ asset('public/img/favicon.png') }}" rel="icon" type="image/x-icon"/>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"/>
  <link href="{{ asset('public/css/owl.carousel.css') }}" rel="stylesheet"/>
  <link href="{{ asset('public/css/style.css') }}" rel="stylesheet"/>
  <meta property="og:type" content="{{ $main_og_type }}"/>
  <meta property="og:title" content="{{ $main_og_title }}"/>
  <meta property="og:url" content="{{ url('/') }}"/>
  <meta property="og:image" content="{{ $main_og_image }}"/>
  <meta property="og:description" content="{{ $main_og_description }}"/>
</head>
<body>
<div class="wrap">
  <header class="main_block">
    <div class="header_top">
      <div class="container">
        <div class="ht_block">
          <div class="ht">
            <div class="image"><img alt="" src="{{ asset('public/img/ht1.png') }}"/></div>
            <div class="text">
              Натуральні<br/>
              компоненти
            </div>
          </div>
          <div class="ht">
            <div class="image"><img alt="" src="{{ asset('public/img/ht2.png') }}"/></div>
            <div class="text">
              Одобрено<br/>
              IFOAM ORGANICS
            </div>
          </div>
          <div class="ht">
            <div class="image"><img alt="" src="{{ asset('public/img/ht3.png') }}"/></div>
            <div class="text">
              Вибір 50 000<br/>
              садівників
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header_bottom">
      <div class="container">
        <div class="main_title">
          <div class="title_border"><h1>5 ELEMENT</h1></div>
          <span
          >НАНОСТИМУЛЯТОР РОСТУ</span
          >
        </div>
      </div>
      <div class="container">
        <div class="prod_sale">
          <div class="ps_left">
            <ul class="list">
              <li class="list_item"> Збільшує врожай і швидкість росту</li>
              <li class="list_item" style="
    top: 6px;
"> Підходить для овочів, фруктів, ягід.
              </li>
              <li class="list_item" style="
    top: 9px;
"> Захищає рослини і розсаду від стресів
              </li>
              <li class="list_item" style="
    top: 13px;
"> Повністю безпечно, не містить нітратів
              </li>
            </ul>
            <div class="amount">
              <p>На складі<br/>залишилось</p>
              <span>248 шт.</span>
            </div>
          </div>
          <div class="sale_block">
            <div class="p_and_count">
              <div class="count">
                <div class="count_title">
                  До кінця акції залишилось:
                </div>
                <div class="countbox">
                  <div class="countbox-num">
                    <div class="countbox-hours"><span></span>10</div>
                    <div class="countbox-hours-text">годин</div>
                  </div>
                  <div class="countbox-num">
                    <div class="countbox-mins"><span></span>56</div>
                    <div class="countbox-mins-text">хвилин</div>
                  </div>
                  <div class="countbox-num">
                    <div class="countbox-secs"><span></span>31</div>
                    <div class="countbox-secs-text">секунд</div>
                  </div>
                </div>
              </div>
              <div class="price">
                <div class="old_price">
                  <div class="title">
                    Звичайна ціна:
                  </div>
                  <div class="numb">{{ $main_old_price }}<span class="cur">грн</span></div>
                </div>
                <div class="new_price">
                  <div class="title">
                    Ціна зі знижкою:
                  </div>
                  <div class="numb">{{ $main_new_price }}<span class="cur">грн</span></div>
                </div>
              </div>
            </div>
            <form
                class="main-order-form sale_form formOne"
                method="post"
                onsubmit="return false;"
            >
              <div class="input_wrap">
                <label for="name"><img src="{{ asset('public/img/male.png') }}" alt=""/></label>
                <input
                    type="text"
                    class="name"
                    id="input_name_1"
                    name="name"
                    min="3"
                    max="32"
                    required=""
                    placeholder="Ваше Ім’я"
                />
              </div>
              <div class="input_wrap">
                <label for="phone"
                ><img src="{{ asset('public/img/phone.png') }}" required="" alt=""
                  /></label>
                <input
                    type="tel"
                    class="phone"
                    name="phone"
                    type="tel"
                    id="input_phone_1"
                    placeholder="Ваш телефон"
                    required=""
                />
              </div>
              <div class="secure">
                <span>Всі Ваші данні під захистом</span>
              </div>
              <div class="sale_button">
                <button class="btn" id="submitButton1">Замовити зараз</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </header>
  <main>
    <section class="look">
      <div class="container">
        <div class="stitle">
          <h2>
            Подивіться, <b>як легко використовувати <br/>5 Element</b>
          </h2>
        </div>
        <div class="look_block">
          <div class="video_wrap">
            <div class="video">
              <div class="video-container">
                <div class="youtube" id="T31oQfP4Iug">
                  <img src="{{ asset('public/img/hqdefault.jpg') }}" class="thumb"/>
                  <div class="play"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="main_slider">
            <div
                class="owl-item"
                style="width: 282px; margin-right: 10px;"
            >
              <div class="slider_item">
                <div class="slider_image">
                  <img alt="" src="{{ asset('public/img/look_slide1.png') }}"/>
                </div>
              </div>
            </div>
            <div
                class="owl-item"
                style="width: 282px; margin-right: 10px;"
            >
              <div class="slider_item">
                <div class="slider_image">
                  <img alt="" src="{{ asset('public/img/look_slide4.jpg') }}"/>
                </div>
              </div>
            </div>
            <div
                class="owl-item"
                style="width: 282px; margin-right: 10px;"
            >
              <div class="slider_item">
                <div class="slider_image">
                  <img alt="" src="{{ asset('public/img/look_slide5.jpg') }}"/>
                </div>
              </div>
            </div>
            <div
                class="owl-item"
                style="width: 282px; margin-right: 10px;"
            >
              <div class="slider_item">
                <div class="slider_image">
                  <img alt="" src="{{ asset('public/img/look_slide2.png') }}"/>
                </div>
              </div>
            </div>
            <div
                class="owl-item"
                style="width: 282px; margin-right: 10px;"
            >
              <div class="slider_item">
                <div class="slider_image">
                  <img alt="" src="{{ asset('public/img/look_slide3.png') }}"/>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
</div>
</section>
<section class="result">
  <div class="container">
    <div class="stitle">
      <h2 class="white">
        <b>Вражаючі результати</b> <br/>застосування наностимулятора
      </h2>
    </div>
    <div class="result_block">
      <div class="result_row">
        <div class="result_item">
          <div class="result_image">
            <img alt="" src="{{ asset('public/img/result1.png') }}"/>
          </div>
          <div class="result_text">
            <h3>Картопля</h3>
            <p>
              Не токсичне, має високу швидкість проникнення в клітини
              рослин. Підвищує на 20-50% врожайність. Регенерує макро і
              мікробіоту ґрунтів, стимулює розвиток кореневої системи.
            </p>
          </div>
        </div>
        <div class="result_item">
          <div class="result_image">
            <img alt="" src="{{ asset('public/img/result2.png') }}"/>
          </div>
          <div class="result_text">
            <h3>Помідори</h3>
            <p>
              Підвищується швидкість накопичення крохмалю,
              потовщується восковий наліт листової пластинки
              захищаючи лист від перегрівання.
            </p>
          </div>
        </div>
      </div>
      <div class="result_row">
        <div class="result_item">
          <div class="result_image">
            <img alt="" src="{{ asset('public/img/result3.png') }}"/>
          </div>
          <div class="result_text">
            <h3>Огірки</h3>
            <p>
              Захищає від атаки патогенів та впливу
              антропогенного навантаження,
              зокрема, кислотних дощів.
              Сприяє утворенню та накопиченню гумусу в ґрунті
            </p>
          </div>
        </div>
        <div class="result_item">
          <div class="result_image">
            <img alt="" src="{{ asset('public/img/result6.png') }}"/>
          </div>
          <div class="result_text">
            <h3>Фруктові</h3>
            <p>
              Препарат абсолютно безпечний, екологічний,
              відноситься до категорії органічних препаратів,
              має відповідні сертифікати. Абсолютно не
              впливає на людину, тварин і комах, не
              накопичується в навколишньому середовищі.
              Є органічним репелентом, що не впливає
              на комах екосистеми.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="comp">
  <div class="container">
    <div class="stitle">
      <h2>
        <b>5 ELEMENT — <span>інноваційні</span> біоактиватори росту,</b><br/>в основі яких
        лежать
        <nobr>5 компонентів</nobr>
      </h2>
    </div>
  </div>
  <div class="comp_wrap">
    <div class="container">
      <div class="comp_block">
        <div class="comp_item">
          <img alt="" src="{{ asset('public/img/comp1.png') }}"/>
          <div class="comp_text">
            <h3>Комплекс 5 Елемент</h3>
            <p>
              Не токсичні, норми внесення надзвичайно малі (20-50 грам
              на 1 га посівів агрокультур)
            </p>
          </div>
        </div>
        <div class="comp_item">
          <img alt="" src="{{ asset('public/img/comp2.png') }}"/>
          <div class="comp_text">
            <h3>Комплекс особливо чистих солей мікроелементів</h3>
            <p>
              Має високу швидкість проникнення в клітини рослин з
              високим коефіцієнтом засвоєння
            </p>
          </div>
        </div>
        <div class="comp_item">
          <img alt="" src="{{ asset('public/img/comp3.png') }}"/>
          <div class="comp_text">
            <h3>Комплекс вторинних бактеріальних метаболітів</h3>
            <p>
              Регенерує макро і мікробіоту ґрунтів, стимулює розвиток
              потужної кореневої системи
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="comp_bottom">
    <div class="container">
      <div class="cb_inner">
        <div class="cb_text">
          Гранули починають свою активну роботу після 1 поливу,
          насичуються водою. Їхня дія поширюється не тільки на рослини,
          але і на грунт навколо.
        </div>
        <a
            class="btn"
            href="#footer"
        >Замовити зараз</a
        >
      </div>
    </div>
  </div>
</section>
<section class="stop">
  <div class="container">
    <div class="stitle">
      <h2><b>Не дайте своєму</b> врожаю загинути!</h2>
    </div>
    <div class="main_slider main_slider2">
      <div
          class="owl-item active"
          style="width: 282px; margin-right: 10px;"
      >
        <div class="slider_item">
          <div class="slider_image">
            <img alt="" src="{{ asset('public/img/main_slider1.png') }}"/>
            <p>Втрачено уже більше 29000 тон огірків</p>
          </div>
        </div>
      </div>
      <div
          class="owl-item"
          style="width: 282px; margin-right: 10px;"
      >
        <div class="slider_item">
          <div class="slider_image">
            <img alt="" src="{{ asset('public/img/main_slider2.png') }}"/>
            <p>
              В 15-ти областях помідори загинули від шкідливих бактерій
            </p>
          </div>
        </div>
      </div>
      <div
          class="owl-item"
          style="width: 282px; margin-right: 10px;"
      >
        <div class="slider_item">
          <div class="slider_image">
            <img alt="" src="{{ asset('public/img/main_slider3.png') }}"/>
            <p>
              878 господарств повідомили про ураження картоплі фітофторозом
            </p>
          </div>
        </div>
      </div>
      <div
          class="owl-item"
          style="width: 282px; margin-right: 10px;"
      >
        <div class="slider_item">
          <div class="slider_image">
            <img alt="" src="{{ asset('public/img/main_slider4.png') }}"/>
            <p>В 85% випадках посаджений часник не зійшов зовсім</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="stop_bottom">
    <div class="container">
      <p>
        Препарат підсилює біофунгіцідний захист насіння,
        у 2-3 рази прискорює ріст і розвиток кореневої системи,
        що призводить до поліпшення мінерального живлення
        (засвоєння макро і мікроелементів). При обробці в
        період вегетації у злаків посилюється кущіння, формування
        продуктивних стебел і повноцінного колосу, прискорює дозрівання.
      </p>
    </div>
  </div>
</section>
<section class="use">
  <div class="container">
    <div class="stitle">
      <h2 class="white"><b>Спосіб</b> застосування</h2>
    </div>
    <div class="use_block">
      <img src="{{ asset('public/img/use_img.png') }}" class="use_img use_img_d" alt=""/>
      <img src="{{ asset('public/img/use_img_p.png') }}" class="use_img use_img_p" alt=""/>
      <div class="use_items">
        <div class="use_item">
          <span class="numb">1</span>
          <img src="{{ asset('public/img/use1.jpg') }}" class="use_item_img" alt=""/>
          <p>
            Одна банка/блістер повністю розводиться в 1-1,5л води
            оброблюється насіння, потім сіється
          </p>
        </div>
        <div class="use_item">
          <span class="numb">2</span>
          <img src="{{ asset('public/img/use2.jpg') }}" class="use_item_img" alt=""/>
          <p>
            Листова обробка здійснюється за наявності сходів
            а саме 4-5 листів перша обробка,
            7-8 листів друга обробка.
          </p>
        </div>
        <div class="use_item">
          <span class="numb">3</span>
          <img src="{{ asset('public/img/use3.jpg') }}" class="use_item_img" alt=""/>
          <p>
            При пересадці на грядку чи початкової посадці в землю -
            обробити листя нанодобривом
          </p>
        </div>
        <div class="use_item">
          <span class="numb">4</span>
          <img src="{{ asset('public/img/use4.jpg') }}" class="use_item_img" alt=""/>
          <p>
            Для технічних культур 1 банка розводиться в 1л води,
            потім заливається в бакову суміш на 200л води,
            препарат сумісний с іншими ЗЗР
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="tcan">
  <div class="container">
    <div class="stitle">
      <h2>Чому <b>5 ELEMENT?</b></h2>
    </div>
    <div class="tcan_block">
      <div class="tcan_item">
        <img alt="" src="{{ asset('public/img/tcan1.png') }}"/>
        <p>
          Схід розсади<br/>
          вище до 95%
        </p>
      </div>
      <div class="tcan_item">
        <img alt="" src="{{ asset('public/img/tcan2.png') }}"/>
        <p>Збільшує врожай, розмір плоду</p>
      </div>
      <div class="tcan_item">
        <img alt="" src="{{ asset('public/img/tcan3.png') }}"/>
        <p>Подходить для всіх видів рослин</p>
      </div>
      <div class="tcan_item">
        <img alt="" src="{{ asset('public/img/tcan4.png') }}"/>
        <p>Відмінно працює навіть на нізькоплодородних грунтах</p>
      </div>
      <div class="tcan_item">
        <img alt="" src="{{ asset('public/img/tcan5.png') }}"/>
        <p>Захищає від атаки патогенів та впливу антропогенного навантаження</p>
      </div>
      <div class="tcan_item">
        <img alt="" src="{{ asset('public/img/tcan6.png') }}"/>
        <p>Покращує смакові властивості плодів</p>
      </div>
    </div>
  </div>
</section>
<section class="secret">
  <div class="container">
    <div class="stitle">
      <h2 class="white">В чому секрет <b>5 ELEMENT?</b></h2>
    </div>
    <div class="secret_block">
      <img alt="" class="secret_product" src="{{ asset('public/img/product.png') }}"/>
      <div class="secret_text">
        <p class="secret_p">
          Секрет ефективності наностимулятора полягає не тільки в унікальному
          складі, але і в особливому формфакторі - дрібнодисперсних
          гранулах. Спочатку відбувається підживлення розсади або
          насіння для збільшення схожості до 95%, далі рослина
          обплітаючи кожну гранулу своїм корінням, бере з неї саме ті
          елементи, які йому необхідні в даний момент та протягом
          усього сезону!
        </p>
        <p>
          <b
          > Комплекс особливо чистих солей мікроелементів
            (ZnSO4, MgSO4, MnSO4, FeSO4, CuSO4, CoSO4, бурштинова кислота,
            брассинолід, комплекс вторинних бактеріальних метаболітів, сахароза.</b
          >
          <span
          >Формування більшої площі листкової поверхні (на 15-25%),
                     що відповідно збільшує ККД фотосинтезу.
                     Успішно бореться з приморозками, посухою і спекою,
                      а також  легше переносить їх наслідки</span
          >
        </p>
        <a
            class="btn btn2"
            href="#footer"
        >Замовити зараз</a
        >
      </div>
    </div>
  </div>
</section>
<section class="expert">
  <div class="container">
    <div class="stitle">
      <h2>Думка <b>професіонала</b></h2>
    </div>
    <div class="expert_block_wrap">
      <div class="expert_block">
        <div class="expert_image">
          <div class="expert_img">
            <img alt="" class="exper_d" src="{{ asset('public/img/expert.jpg') }}"/>
            <img alt="" class="exper_p" src="{{ asset('public/img/expert_p.jpg') }}"/>
          </div>
          <div class="expert_name">
            <b
            >Замилавский Петро <br/>
              Володимирович,</b
            >
            <span>агроном, стаж 25 років</span>
          </div>
        </div>
        <div class="expert_text">
          <p>
            Упевнений, що більшість городників знає, що якщо не давати
            землі відпочинок і виробляти посадку одних і тих же
            сільськогосподарських культур на одному місці, то це
            призведе згодом до падіння врожайності і різних захворювань
            рослин.
          </p>
          <p class="expert_pr">
            <b
            >5 ELEMENT не тільки збільшує врожайність культур, а й
              значно впливає на схожість і опірність рослин хворобам і
              паразитам. притому урожай не тільки стає рясніше, але і
              вирощені овочі та фрукти виростають набагато смачніше і
              корисніше.</b
            >
          </p>
          <p>
            І всього цього можна досягти без будь-якої хімії та
            новомодних ГМО, на своїй присадибній ділянці, використовуючи
            лише 5 ELEMENT. Великого, смачного і корисного Вам врожаю і
            красивого саду.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="reviews">
  <div class="container">
    <div class="stitle">
      <h2>Відгуки <b>реальних покупців</b></h2>
    </div>
  </div>
  <div class="container slider_container">
    <div class="rev_block">

      <div class="rev_item">
        <div class="image">
          <img alt="" src="{{ asset('public/img/rev2.png') }}"/>
        </div>
        <div class="text">
          <div class="name">
            <b>Черкасов Андрій Юрійович</b>
          </div>
          <p>
            У Кіровоградській області не найкращі умови для
            підсобного сільського господарства. Зернові-то
            нормально ростуть, а ось з іншим вже не так все добре.
            пара припізнілих заморозків і немає врожаю... Тільки з
            5 ELEMENT вдалося поліпшити ситуацію, з цим добривом
            сходи виростають більш сильними і легше переносять
            погодні коливання.
          </p>
        </div>
      </div>

      <div class="rev_item">
        <div class="image">
          <img alt="" src="{{ asset('public/img/rev3.png') }}"/>
        </div>
        <div class="text">
          <div class="name">
            <b>Болобонова Світлана Іванівна</b>
          </div>
          <p>
            Головна проблема з якою стикаємося при вирощуванні
            овочів - погана схожість через посушливого клімату.
            Добрива води як такої не додають, але дозволяють
            сходам зійти максимально сильними і набрати соків. З 5
            ELEMENT нам нарешті вдалося виростити хороший урожай
            незважаючи на тривалу посуху і епідемію фітофлори у
            всіх сусідів, нас вона успішно обійшла стороною.
          </p>
        </div>
      </div>

      <div class="rev_item">
        <div class="image">
          <img alt="" src="{{ asset('public/img/rev1.png') }}"/>
        </div>
        <div class="text">
          <div class="name">
            <b>Галина Іванівна Васнецова</b>
          </div>
          <p>
            У нас під Києвом, земля - суцільна глина, все росте
            дуже погано. Довго не могли підібрати підходяще
            добриво, щоб виростити нормальний урожай. Після довгих
            пошуків зупинилася на 5 ELEMENT. Результат виявився в
            той же сезон. Огірки зійшли на 2 тижні раніше, ніж у
            сусідів, і весь кущ просто усипаний був паростками.
            Вперше змогли зібрати хороший урожай томатів і
            огірків.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>
<section class="order">
  <div class="order_top">
    <div class="container">
      <div class="stitle">
        <h2>3 кроки для <b>замовлення 5 ELEMENT!</b></h2>
      </div>
      <div class="order_block">
        <div class="order_item">
          <div class="image"><img alt="" src="{{ asset('public/img/order1.png') }}"/></div>
          <p>
            Заповнітье форму<br/>
            зворотнього зв'язку
          </p>
        </div>
        <div class="order_item">
          <div class="image"><img alt="" src="{{ asset('public/img/order2.png') }}"/></div>
          <p>
            Дочекайтеся дзвінка<br/>
            оператора
          </p>
        </div>
        <div class="order_item">
          <div class="image"><img alt="" src="{{ asset('public/img/order3.png') }}"/></div>
          <p>
            Оплатіть товар після<br/>
            отримання
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="order_bottom">
    <div class="container">
      <div class="ob_block">
        <div class="ob_item">
          <b>Товар відправляється<br/>
            <span>в будь-яку точку країни</span>
            <br/>
            в період 1-3 робочих днів
          </b
          >
        </div>
        <div class="ob_item">
          <b><span>Без предоплати</span><br/>
            Ви оплачуєте товар
            <br>
            тільки по факту його отримання
          </b>
        </div>
        <div class="ob_item">
          <b>
                    <span>БЕЗКОШТОВНА ДОСТАВКА<br/>
                      </span
                      >
            ВІД 10 УПАКОВОК<br/>
          </b
          >
        </div>
      </div>
    </div>
  </div>
</section>
<div class="main_block last_block">
  <div class="header_bottom">
    <div class="container">
      <div class="main_title">
        <div class="title_border"><h1>5 ELEMENT</h1></div>
        <span
        >НАНОСТИМУЛЯТОР РОСТУ</span
        >
      </div>
    </div>
    <div class="container">
      <div class="prod_sale">
        <div class="ps_left">
          <ul class="list">
            <li class="list_item"> Збільшує врожай і швидкість росту</li>
            <li class="list_item" style="
    top: 6px;
"> Підходить для овочів, фруктів, ягід.
            </li>
            <li class="list_item" style="
    top: 9px;
"> Захищає рослини і розсаду від стресів
            </li>
            <li class="list_item" style="
    top: 13px;
"> Повністю безпечно, не містить нітратів
            </li>
          </ul>
          <div class="amount">
            <p>На складі <br/>залишилось</p>
            <span>248 шт.</span>
          </div>
        </div>
        <div class="sale_block">
          <div class="p_and_count">
            <div class="count">
              <div class="count_title">
                До кінця акції залишилось:
              </div>
              <div class="countbox">
                <div class="countbox-num">
                  <div class="countbox-hours"><span></span>10</div>
                  <div class="countbox-hours-text">годин</div>
                </div>
                <div class="countbox-num">
                  <div class="countbox-mins"><span></span>56</div>
                  <div class="countbox-mins-text">хвилин</div>
                </div>
                <div class="countbox-num">
                  <div class="countbox-secs"><span></span>31</div>
                  <div class="countbox-secs-text">секунд</div>
                </div>
              </div>
            </div>
            <div class="price">
              <div class="old_price">
                <div class="title">
                  Звичайна ціна:
                </div>
                <div class="numb">{{ $main_old_price }}<span class="cur">грн</span></div>
              </div>
              <div class="new_price">
                <div class="title">
                  Ціна зі знижкою:
                </div>
                <div class="numb">{{ $main_new_price }}<span class="cur">грн</span></div>
              </div>
            </div>
          </div>
          <form
              class="main-order-form sale_form formTwo"
              id="order"
              method="post"
              onsubmit="return false;"
          >
            <div class="input_wrap">
              <label for="name"
              ><img src="{{ asset('public/img/male.png') }}" alt=""
                /></label>
              <input
                  id="input_name_2"
                  min="3"
                  max="32"
                  type="text"
                  class="name"
                  name="name"
                  required=""
                  placeholder="Ваше Ім’я"
              />
            </div>
            <div class="input_wrap">
              <label for="phone"
              ><img src="{{ asset('public/img/phone.png') }}" required="" alt=""
                /></label>
              <input
                  type="tel"
                  id="input_phone_2"
                  class="phone"
                  name="phone"
                  placeholder="Ваш телефон"
                  required=""
              />
            </div>
            <div class="secure">
              <span>Ваши данні під захистом</span>
            </div>
            <div class="sale_button">
              <button class="btn" id="submitButton2">замовити</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</main>
<footer id="footer">
  <div class="copy">
    <center>
      <p style="text-align: center">
        <a href="https://5elementspe.com/ua/dogovor" target="_blank">Договір публічної оферти</a>
      </p>
    </center>
  </div>
</footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://unpkg.com/imask"></script>
<script src="{{ asset('public/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/js/common.js') }}"></script>
<script>
  let element1 = document.getElementById('input_phone_1');
  let element2 = document.getElementById('input_phone_2');
  let maskOptions = {mask: '+{38}(000)00-00-000'};
  let mask1 = IMask(element1, maskOptions);
  let mask2 = IMask(element2, maskOptions);
</script>
<style type="text/css">
  .youtube {
    max-width: 100%;
    height: inherit;
    overflow: hidden;
    position: relative;
    cursor: hand;
    cursor: pointer;
  }

  .youtube .thumb {
    bottom: 0;
    left: 0;
    margin: auto;
    max-width: 100%;
    position: absolute;
    right: 0;
    top: 0;
    width: 100%;
    height: auto;
  }

  .youtube .play {
    -webkit-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    transform: translateY(-50%);
    height: 136px;
    left: 0;
    margin: auto;
    right: 0;
    position: absolute;
    top: 50%;
    width: 136px;
    background: url("{{ asset('public/img/play.png') }}") no-repeat;
  }
</style>

@if (config('app.env') == 'production' && $main_analytics)
  <!-- analytics -->

  {!! $main_analytics !!}

  <!-- /analytics -->
@endif
</body>
</html>