<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
?>

<section class="relative bg-blue-900 py-20 lg:py-28 overflow-hidden" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <!-- Background cityscape decoration -->
    <div class="absolute bottom-0 left-0 right-0 opacity-10 pointer-events-none" aria-hidden="true">
        <svg class="w-full h-auto text-blue-400" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMax slice">
            <path fill="currentColor" d="M0,320 L0,260 L30,260 L30,200 L60,200 L60,160 L90,160 L90,120 L120,120 L120,180 L150,180 L150,240 L180,240 L180,200 L210,200 L210,160 L240,160 L240,220 L270,220 L270,260 L300,260 L300,320 Z" />
            <path fill="currentColor" d="M320,320 L320,240 L350,240 L350,180 L380,180 L380,140 L410,140 L410,100 L440,100 L440,160 L470,160 L470,220 L500,220 L500,260 L530,260 L530,200 L560,200 L560,160 L590,160 L590,180 L620,180 L620,240 L650,240 L650,280 L680,280 L680,320 Z" />
            <path fill="currentColor" d="M720,320 L720,250 L750,250 L750,190 L780,190 L780,150 L810,150 L810,130 L840,130 L840,170 L870,170 L870,210 L900,210 L900,260 L930,260 L930,220 L960,220 L960,180 L990,180 L990,240 L1020,240 L1020,280 L1050,280 L1050,320 Z" />
            <path fill="currentColor" d="M1080,320 L1080,260 L1110,260 L1110,200 L1140,200 L1140,160 L1170,160 L1170,180 L1200,180 L1200,220 L1230,220 L1230,260 L1260,260 L1260,200 L1290,200 L1290,160 L1320,160 L1320,140 L1350,140 L1350,180 L1380,180 L1380,240 L1410,240 L1410,280 L1440,280 L1440,320 Z" />
            <circle cx="80" cy="300" r="15" fill="currentColor" />
            <circle cx="380" cy="310" r="12" fill="currentColor" />
            <circle cx="800" cy="305" r="14" fill="currentColor" />
            <circle cx="1180" cy="315" r="10" fill="currentColor" />
            <circle cx="1360" cy="300" r="16" fill="currentColor" />
        </svg>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 relative z-10">
        <!-- Title -->
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white text-center mb-16 lg:mb-20">
            Submit a Help Ticket
        </h2>

        <!-- Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            <!-- Riders -->
            <a href="#" class="group bg-white flex flex-col items-center justify-center py-16 px-6 text-center transition-all duration-300 hover:-translate-y-1 hover:shadow-xl" aria-label="Submit a help ticket for Riders">
                <svg class="w-16 h-16 text-blue-900 mb-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 64 64" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M10 40V28a4 4 0 014-4h4l5-10h18l5 10h4a4 4 0 014 4v12" />
                    <circle cx="20" cy="44" r="5" />
                    <circle cx="44" cy="44" r="5" />
                    <path d="M25 44h14" />
                    <path d="M19 24h26" />
                    <path d="M14 32h4" />
                    <path d="M46 32h4" />
                </svg>
                <span class="text-lg font-semibold text-blue-900">Riders</span>
            </a>

            <!-- Drivers -->
            <a href="#" class="group bg-white flex flex-col items-center justify-center py-16 px-6 text-center transition-all duration-300 hover:-translate-y-1 hover:shadow-xl" aria-label="Submit a help ticket for Drivers">
                <svg class="w-16 h-16 text-blue-900 mb-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 64 64" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="32" cy="32" r="22" />
                    <circle cx="32" cy="32" r="7" />
                    <path d="M32 10v12" />
                    <path d="M32 42v12" />
                    <path d="M10 32h12" />
                    <path d="M42 32h12" />
                    <path d="M16.5 16.5l8.5 8.5" />
                    <path d="M39 39l8.5 8.5" />
                    <path d="M16.5 47.5l8.5-8.5" />
                    <path d="M39 25l8.5-8.5" />
                </svg>
                <span class="text-lg font-semibold text-blue-900">Drivers</span>
            </a>

            <!-- Partners -->
            <a href="#" class="group bg-white flex flex-col items-center justify-center py-16 px-6 text-center transition-all duration-300 hover:-translate-y-1 hover:shadow-xl" aria-label="Submit a help ticket for Partners">
                <svg class="w-16 h-16 text-blue-900 mb-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 64 64" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M12 38l8-8 6 6-8 8z" />
                    <path d="M52 38l-8-8-6 6 8 8z" />
                    <path d="M20 30l8 8 8-8" />
                    <path d="M32 12l3 6 6 3-6 3-3 6-3-6-6-3 6-3z" />
                </svg>
                <span class="text-lg font-semibold text-blue-900">Partners</span>
            </a>

            <!-- Report an Incident -->
            <a href="#" class="group bg-white flex flex-col items-center justify-center py-16 px-6 text-center transition-all duration-300 hover:-translate-y-1 hover:shadow-xl" aria-label="Report an Incident">
                <svg class="w-16 h-16 text-blue-900 mb-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 64 64" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <rect x="18" y="8" width="28" height="44" rx="3" />
                    <path d="M26 8V4a2 2 0 012-2h8a2 2 0 012 2v4" />
                    <path d="M24 20h16" />
                    <path d="M24 28h12" />
                    <path d="M24 36h8" />
                    <path d="M42 40l-6 12h12l-6-12z" />
                    <circle cx="42" cy="53" r="1.5" fill="currentColor" stroke="none" />
                </svg>
                <span class="text-lg font-semibold text-blue-900 leading-tight">Report an<br>Incident</span>
            </a>

            <!-- Schedule a Ride -->
            <a href="#" class="group bg-white flex flex-col items-center justify-center py-16 px-6 text-center transition-all duration-300 hover:-translate-y-1 hover:shadow-xl" aria-label="Schedule a Ride">
                <svg class="w-16 h-16 text-blue-900 mb-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 64 64" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="20" cy="14" r="5" />
                    <path d="M20 20v12" />
                    <path d="M14 40h12" />
                    <path d="M16 32h8v10h-8z" />
                    <rect x="34" y="32" width="20" height="10" rx="2" />
                    <circle cx="38" cy="44" r="3" />
                    <circle cx="50" cy="44" r="3" />
                    <path d="M34 38h20" />
                </svg>
                <span class="text-lg font-semibold text-blue-900 leading-tight">Schedule a<br>Ride</span>
            </a>
        </div>
    </div>
</section>
