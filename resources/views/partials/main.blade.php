<main>


       <div class="container-fluid bb-jumbo">
                <div class="bb-jumbo-main">
                    <input type="search" id="address-input" class="form-control" placeholder="Where are we going?" />
                        <div class="kp--nr-forms kp--form-group radius kp--form-small">
                            <div class="form-group kp--form-group">
                                <label for="radius">Radius</label>
                                <input type="number" name="radius" class="form-control" id="radius" value="20">
                            </div>
                            <div class="form-group kp--form-group">
                                <label for="number_rooms">Number Rooms</label>
                                <input type="number" name="number_rooms" class="form-control" id="number_rooms" value="1">
                            </div>
                            <div class="form-group kp--form-group">
                                <label for="number_beds">Number Beds</label>
                                <input type="number" name="number_beds" class="form-control" id="number_beds" value="1">
                            </div>



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
