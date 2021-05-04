<span class="pl-2 block text-xl" id="cartQuantity">
    @if($cartCount)
        {{ $cartCount }}
    @endif
</span>
@push('javascript')
{{--    <script defer>--}}
{{--        async function fetchCartContent (){--}}
{{--            const id = 1;--}}
{{--            const res = await fetch((`cart/${id}`), {--}}
{{--                method: 'GET',--}}
{{--            });--}}

{{--            const data = await res.json();--}}

{{--            const context = data.context['027c91341fd5cf4d2579b49c4b6a90da'];--}}

{{--            const qty = context.qty;--}}
{{--            const cardQuantity = document.querySelector('#cartQuantity');--}}
{{--            cardQuantity.textContent = qty;--}}
{{--        }--}}

{{--        setInterval(() => fetchCartContent(), 1000)--}}
{{--    </script>--}}
@endpush
