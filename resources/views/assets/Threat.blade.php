@extends('layouts.app')

@section('title', 'threat')

@section('content')

<div class="container">
    <h1>Create Threat for Asset: {{ $asset->name }}</h1>

    <form action="{{ route('threat.store') }}" method="POST">
        @csrf

        <input type="hidden" name="asset_id" value="{{ $asset->id }}">

        <div class="form-group">
            <label for="stride_name">STRIDE Name</label>
            <select class="form-control" id="stride_name" name="stride_name">
                @foreach(['Spoofing', 'Tampering', 'Repudiation', 'InformationDisclosure', 'DenialOfService', 'ElevationOfPrivileges'] as $stride)
                    <option value="{{ $stride }}" {{ ($asset->threat && $stride == $asset->threat->stride_name) ? 'selected' : '' }}>{{ $stride }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="threat_name">Threat Name</label>
            <input type="text" name="threat_name" id="threat_name" class="form-control" value="{{ $asset->threat ? $asset->threat->threat_name : '' }}">
        </div>

        <button type="submit" class="btn btn-primary">Save Threat</button>
    </form>
</div>


    <div class="asset-details-icon" onclick="togglePopup()">
    <i class="fas fa-info-circle">Asset details</i>
    </div>
    
    <div class="dialog-container" id="assetDetailsPopup">
        <div class="card">
            <h2>Asset Details</h2>

            @if($asset->threat)
            <p>STRIDE Name: {{ $asset->threat->stride_name }}</p>
            <p>Threat Name: {{ $asset->threat->threat_name }}</p>
            @else
                <p>No threat details available for this asset.</p>
            @endif
            <button type="button" class="action-button btn btn-secondary" onclick="closeAssetDetailsPopup()">Close</button>
         </div>
    </div>
    @section('scripts')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/threat.js') }}"></script>
    @endsection

@endsection