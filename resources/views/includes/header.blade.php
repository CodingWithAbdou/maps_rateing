<form action="{{ route('search') }}" method="post">
    @csrf
    <div class="flex flex-row p-5">
        <div class="w-6/12">
            <input id="address" name="address" type="text" autocomplete="off" class="p-2 w-full bg-gray-200 rounded-md"
                placeholder="حدد العنوان">
            <div id="address-list" class="cursor-pointer mt-1 "></div>
        </div>
        <div class="w-6/12">
            <select class="p-1 py-2 mr-5 bg-gray-200 w-full rounded-md" name="category">
                <option value="">حدد التصنيف </option>
                @include('includes\category_list')
            </select>
        </div>
        <div class="mr-5">
            <button type="submit"
                class="py-2 px-5 bg-gray-500 hover:bg-gray-400 text-white mr-5 rounded-md">بحث</button>
        </div>
    </div>
</form>
<section class="m-auto text-center ">
    <div class="category mt-5">
        <ul>
            @foreach ($categories as $category)
                <li>
                    <a href="{{ route('category.places', $category->slug) }}" class="bg-blue-900 hover:bg-gray-400">
                        {{ $category->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</section>

@push('modals')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $('#address').on('keyup', function() {
            $('#address-list').fadeIn()
            let address = $(this).val();
            $.ajax({
                url: "{{ route('auto.complete') }}",
                type: "GET",
                data: {
                    "address": address
                }
            }).done(function(data) {
                $('#address-list').html(data)
            })
            $('#address-list').on('click', 'li', function() {
                $('#address').val($(this).text())
                $('#address-list').fadeOut()
            })
        })
    </script>
@endpush
