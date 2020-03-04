<p>Mr(s) there is a new sale waiting for approval</p>
<p>Id: {{$sale->id}}</p>
<p>Name : {{$sale->name}}</p>
<p>Address : {{$sale->address}}</p>
<p>Langaje : {{$sale->languaje}}</p>
<p>Email : {{$sale->email}}</p>
<p>Phone : {{$sale->telephone}}</p>
<p>Type of loss : {{$sale->loss_type}}</p>
<p>Age of ross : {{$sale->loss_roof}}</p>
<p>Has Mortage : <b>{{$sale->mortage ? 'YES' : 'NO'}}</b></p>
@if($sale->mortage)
    <p>Mortage : {{$sale->mortage_name}}</p>
@endif
<p>Floors Quantity : {{$sale->floors}}</p>
<p>Any Separate Structures : <b>{{$sale->separated_structures ? 'YES' : 'NO'}}</b></p>
<p>Interior damage : <b>{{$sale->interior_damage ? 'YES' : 'NO'}}</b></p>
@if($sale->interior_damage)
    <p>Interior Damage Detail : {{$sale->interior_damage_detail}}</p>
@endif
<p>Previus Claim : {{$sale->previous_claim ? 'YES' : 'NO'}}</p>
@if($sale->previous_claim)
    <p>Previous Claim Status {{$sale->previous_claim_status}}</p>
    <p>Previous Claim Date {{$sale->previous_claim_date }}</p>
@endif
<p>Claim # : {{$sale->claim_number}}</p>
<p>Adjuster : {{$sale->adjuster}}</p>
<p>Aditional Notes : {{$sale->aditional}}</p>
