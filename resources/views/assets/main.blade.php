@extends('layouts.app')

@section('title', 'main')

@section('content')

<div class="dashboard-components">
    <h2>Dashboard Components</h2>
    <ul>
        <li>
            <strong>Overview of assets:</strong>
            <p>List of assets with key details such as name, type, and criticality.</p>
        </li>
        <li>
            <strong>Recent threat assessments:</strong>
            <p>Summary of recent threat assessments, including threat names, severity levels, and dates.</p>
        </li>
        <li>
            <strong>Risk ratings:</strong>
            <p>Visual representation of risk ratings for each asset, possibly using a color-coded system.</p>
        </li>
        <li>
            <strong>Actionable insights:</strong>
            <p>Recommendations or alerts based on the current threat landscape and risk assessments.</p>
        </li>
    </ul>
</div>

@endsection