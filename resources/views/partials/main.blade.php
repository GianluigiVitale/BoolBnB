<main>


       <div class="container-fluid bb-jumbo">
                <div class="bb-jumbo-main">
                    <input type="search" id="address-input" class="form-control" placeholder="Where are we going?" />
                        <div class="radius">
                            <label for="radius">Radius</label>
                            <input type="number" name="radius" class="form-control" id="radius" value="20">
                        </div>
                        <div class="bb-flex">
                            @foreach ($services as $service)
                            <div id="service-list" class="form-check ">
                                   <input class="form-check-input " type="checkbox" value="{{$service->id}}" id="defaultCheck1">
                                   <label class="form-check-label " for="defaultCheck1">{{$service->service_name}}</label>
                            </div>
                            @endforeach
                        </div>
                </div>
       </div>
</main>
