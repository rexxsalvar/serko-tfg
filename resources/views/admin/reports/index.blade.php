@extends('layouts.app')

@section('content')
    <section class="space-y-6">
        <div class="serko-card serko-reveal px-8 py-8">
            <p class="serko-kicker">{{ __('serko.admin.reports_kicker') }}</p>
            <h1 class="font-display mt-3 text-4xl font-black tracking-tight text-white">{{ __('serko.admin.reports_title') }}</h1>
            <p class="mt-3 max-w-2xl text-gray-400">{{ __('serko.admin.reports_subtitle') }}</p>
        </div>

        <div class="grid gap-4 md:grid-cols-4">
            <x-stat-card :label="__('serko.admin.paid_orders')" :value="$paidOrders" />
            <x-stat-card :label="__('serko.admin.revenue')" :value="number_format($revenue, 2).' EUR'" />
            <x-stat-card :label="__('serko.admin.events_metric')" :value="$events" />
            <x-stat-card :label="__('serko.admin.sold_tickets')" :value="$soldTickets" />
        </div>

        <x-card class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="font-display text-2xl font-black text-white">{{ __('serko.admin.exports_title') }}</h2>
                <p class="mt-2 text-gray-400">{{ __('serko.admin.exports_subtitle') }}</p>
                <x-textarea name="admin_report_notes" class="mt-4" rows="2" placeholder="Internal report notes"></x-textarea>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('admin.reports.sales') }}" class="serko-button">{{ __('serko.admin.export_sales') }}</a>
                <a href="{{ route('admin.reports.events') }}" class="serko-button-secondary">{{ __('serko.admin.export_events') }}</a>
            </div>
        </x-card>
    </section>
@endsection
