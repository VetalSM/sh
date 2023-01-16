<x-layout>
    @if(App::currentLocale() ==='ua')
    @section('title')Купить Candlescience в Украине@endsection

    @section('description')Candlescience США для свечей, массажных масел, косметики, мыла. Если оплату осуществили до 13:00 отпровляем в тот же день.@endsection
    <div class="card text-left items-center mx-auto" >
        <div class="card-body">
            <h3 class="card-title text-center " style="padding-bottom: 15px;"><span class="text-secondary">Оплата</span></h3>
            <p class="card-text">   <span class="text-danger">Відправка замовлень здійснюється тільки після повної передоплати за замовлення</span>.<p/>


                Після оформлення замовлення з вами зв'яжеться менеджер для підтвердження наявності всіх позицій та  уточнення деталей.
                Тільки після уточнення наявності позицій, замовлення може бути оплачене.<p/>
                Оплата за замовлення здійснюється на картку Приват Банку або Моно Банку. Додаткові відомості про оплату надсилаються у повідомленні.<p/>

                Після сплати, обов'язково повідомте нас про це та надішліть скріншот про оплату.<p/>

                Нагадаємо, що  послуги доставки сплачує замовник, також всі замовлення при доставці застраховуються на повну вартість замовлення.<p/>

                Дякуємо за те,
                що ви з нами!</p>
            @else
                @section('title')Купить Candlescience в Украине@endsection

                @section('description')Candlescience США для свечей, массажных масел, косметики, мыла. Если оплату осуществили до 13:00 отпровляем в тот же день.@endsection
                <div class="card text-left items-center mx-auto" >
                    <div class="card-body">
                        <h3 class="card-title text-center " style="padding-bottom: 15px;"><span class="text-secondary">Оплата</span></h3>
                        <p class="card-text">   <span class="text-danger">Отправка заказов производится только после полной предоплаты за заказ</span>.<p/>


                        После оформления заказа с вами свяжется менеджер для подтверждения всех позиций и уточнения деталей.
                        Только после уточнения наличия позиций заказ может быть оплачен.<p/>
                        Оплата за заказ производится на карту Приват Банка или Моно Банка. Дополнительные сведения об оплате отправляются в сообщении.<p/>

                        После оплаты, обязательно сообщите нам об этом и отправьте скриншот об оплате.<p/>

                        Напомним, что услуги доставки оплачивает покупатель, также все заказы при доставке застраховываются на полную стоимость заказа.<p/>

                        Спасибо за то,
                        что вы с нами!</p>

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
                {{__('До каталогу')}}
            </a>
        </div>
    </div>

    <div>


        </div>
</x-layout>
