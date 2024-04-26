@extends('layouts.app')

@section('title', 'main')

@section('content')
    
<div class="container">
    <h1>Asset Details: {{ $asset->name }}</h1>

  
    <h2>Damage Details</h2>
    @if($asset->damage)
    <p>Security property: {{ $asset->damage->security_property }}</p>
    <p>Damage scenario: {{ $asset->damage->damage_scenario }}</p>
    <p>Safety impact: {{ $asset->damage->safety_impact }}</p>
    <p>Safety justification: {{ $asset->damage->safety_justification }}</p>
    <p>financial Impact: {{ $asset->damage->financial_impact }}</p>
    <p>financial justification: {{ $asset->damage->financial_justification }}</p>
    <p>operational Impact: {{ $asset->damage->operational_impact }}</p>
    <p>operational justification: {{ $asset->damage->operational_justification }}</p>
    <p>Privacy Impact: {{ $asset->damage->privacy_impact }}</p>
    <p>Privacy justification: {{ $asset->damage->privacy_justification }}</p>
    @else
        <p>No damage details available for this asset.</p>
    @endif

    <h2>Threat Details</h2>
    @if($asset->threat)
    <p>STRIDE Name: {{ $asset->threat->stride_name }}</p>
    <p>Threat Name: {{ $asset->threat->threat_name }}</p>
    @else
        <p>No threat details available for this asset.</p>
    @endif

    <h2>TARA Details</h2>
    @if($asset->tara)
        <p>Attack Path: {{ $asset->tara->attack_path }}</p>
        <p>Elapsed Time: {{ $asset->tara->elapsed_time }}</p>
        <p>Specialist Expertise: {{ $asset->tara->specialist_expertise }}</p>
        <p>Knowledge Item: {{ $asset->tara->knowledge_item }}</p>
        <p>Window of Opportunity: {{ $asset->tara->window_of_opportunity }}</p>
        <p>Equipment: {{ $asset->tara->equipment }}</p>
    @else
        <p>No TARA details available for this asset.</p>
    @endif

</div>

@endsection