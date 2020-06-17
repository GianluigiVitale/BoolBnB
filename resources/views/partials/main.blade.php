<main>
       <input type="search" id="address-input" class="form-control" placeholder="Where are we going?" />
       @foreach ($services as $service)
       <div id="service-list" class="form-check">
              <input class="form-check-input" type="checkbox" value="{{$service->service_name}}" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">{{$service->service_name}}</label>
       </div>
       @endforeach
</main>
