<div class="col-lg-12 mb-3">
    <form action="{{route('search_project')}}" method="POST">
        @csrf
        <div class="search_input-project">
                <input name="keywork" type="text" placeholder="Input Project Name to Search">
                <div>
                    <i class="fa-solid fa-magnifying-glass" style="color: cornflowerblue"></i>
                </div>

            </div>
    </form>
</div>
