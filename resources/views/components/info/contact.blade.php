<x-layout>
    @if(App::currentLocale() ==='ua')
        @section('title')Candlescience - купить аромамасла в магазине madeis Украина, отдушки Candlescience(США) в Украине@endsection
        @section('description')Candlescience США вы можете купить на нашем сайте или связаться с нами любым из удобных способов для вас.@endsection
        <div class="card text-left  mx-auto" style="">
            <div class="card-body">
                <h3 class="card-title text-center " style="padding-bottom: 15px;"><span
                        class="text-secondary">Контакти</span></h3>
                <p class="card-text text-center">
                    Ви можете зв'язатись з нами за номером телефону: <br/>
                    <span class="text-danger text-center"> +380955600435 <br/>
                    e-mail: support@madeis.com.ua</span>
                    <br/> <br/>
                    <span class="card-text text-center">Або приєднуйтесь до наших спільнот у меседжерах: <br/>
                <a href="https://www.facebook.com/madeis.ua"
                >Facebook
                </a>/
                <a href="https://www.instagram.com/madeis.ua/"
                >Instagram
                </a>/
                <a href="https://t.me/MadeIS_UA"
                >Telegram
                </a>
                    <br/>
                       <br/>
                    Графік роботи:<br/>
                  ПН-ПТ: з 9.00 до 18.00 <br/><span class="text-danger">СБ: вихідний день</span> <br/>
                    НД: з 10.00 до 16.00
                    <br/>
 <br/>
                @else
                            @section('title')Candlescience - купить аромамасла в магазине madeis Украина, отдушки Candlescience(США)в Украине@endsection
                            @section('description')Candlescience США вы можете купить на нашем сайте или связаться снами любым из удобных способов для вас.@endsection
                <div class="card text-left  mx-auto" style="">
                    <div class="card-body">
                        <h3 class="card-title text-center " style="padding-bottom: 15px;"><span
                                class="text-secondary">Контакты</span></h3>
                        <p class="card-text text-center">
                            Вы можете связаться с нами по телефону: <br/>
                            <span class="text-danger text-center"> +380955600435 <br/>
                    e-mail: support@madeis.com.ua</span>
                            <br/> <br/>
                            <span
                                class="card-text text-center">Или присоединяйтесь к нашим сообществам в месседжерах: <br/>
                <a href="https://www.facebook.com/madeis.ua"
                >Facebook
                </a>/
                <a href="https://www.instagram.com/madeis.ua/"
                >Instagram
                </a>/
                <a href="https://t.me/MadeIS_UA"
                >Telegram
                </a>
                    <br/>
                       <br/>
                    График работы:<br/>
                  ПН-ПТ: с 9.00 до 18.00 <br/><span class="text-danger">СБ: выходной день</span> <br/>
                    ВС: с 10.00 до 16.00
                    <br/>
 <br/>
                    @endif
                <a href="/{{app()->getLocale()}}"
                   class="transition-colors duration-300 relative inline-flex  hover:text-blue-500">
                    <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                            </path>
                            <path class="fill-current"
                                  d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                            </path>
                        </g>
                    </svg>
                  {{__("До каталогу")}}
                </a>
                </span>
                    </div>
                </div>
            </div>
        </div>
</x-layout>

