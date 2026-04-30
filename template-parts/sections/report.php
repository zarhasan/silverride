<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
?>

<section class="bg-white py-12 lg:py-20" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">
        <!-- Header -->
        <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-8">
            Get Help for an incident
        </h1>

        <a href="#" class="btn btn-primary mb-8">
            Get Help
        </a>

        <!-- File a Complaint -->
        <h2 class="text-[1.625rem] font-bold text-gray-900 mb-4">
            File a Complaint with a State
        </h2>

        <div class="flex flex-wrap gap-x-3 gap-y-2 text-sm text-primary mb-12">
            <a href="#arizona" class="hover:text-primary hover:underline transition-colors">AZ</a>
            <span class="text-gray-400">&middot;</span>
            <a href="#california" class="hover:text-primary hover:underline transition-colors">CA</a>
            <span class="text-gray-400">&middot;</span>
            <a href="#florida" class="hover:text-primary hover:underline transition-colors">FL</a>
            <span class="text-gray-400">&middot;</span>
            <a href="#georgia" class="hover:text-primary hover:underline transition-colors">GA</a>
            <span class="text-gray-400">&middot;</span>
            <a href="#kentucky" class="hover:text-primary hover:underline transition-colors">KY</a>
            <span class="text-gray-400">&middot;</span>
            <a href="#massachusetts" class="hover:text-primary hover:underline transition-colors">MA</a>
            <span class="text-gray-400">&middot;</span>
            <a href="#maryland" class="hover:text-primary hover:underline transition-colors">MD</a>
            <span class="text-gray-400">&middot;</span>
            <a href="#nevada" class="hover:text-primary hover:underline transition-colors">NV</a>
            <span class="text-gray-400">&middot;</span>
            <a href="#new-jersey" class="hover:text-primary hover:underline transition-colors">NJ</a>
            <span class="text-gray-400">&middot;</span>
            <a href="#new-mexico" class="hover:text-primary hover:underline transition-colors">NM</a>
            <span class="text-gray-400">&middot;</span>
            <a href="#pennsylvania" class="hover:text-primary hover:underline transition-colors">PA</a>
            <span class="text-gray-400">&middot;</span>
            <a href="#texas" class="hover:text-primary hover:underline transition-colors">TX</a>
            <span class="text-gray-400">&middot;</span>
            <a href="#virginia" class="hover:text-primary hover:underline transition-colors">VA</a>
            <span class="text-gray-400">&middot;</span>
            <a href="#washington" class="hover:text-primary hover:underline transition-colors">WA</a>
        </div>

        <!-- Drug & Alcohol Policy -->
        <h2 class="text-[1.625rem] font-bold text-gray-900 mb-4">
            Drug & Alcohol Policy
        </h2>

        <div class="space-y-4 text-[1.125rem] text-gray-900 leading-relaxed mb-12">
            <p>
                SilverRide is dedicated to providing a safe, dependable service to its clients and a safe, enjoyable work environment for drivers and employees. SilverRide has a zero-tolerance drug and alcohol policy while using the SilverRide platform.
            </p>
            <p>
                This policy is in effect at all times that a driver is logged into SilverRide's network both when the driver is providing a prearranged ride, as well as when the driver is logged in, but not providing a prearranged ride.
            </p>
        </div>

        <!-- Need to Report -->
        <h2 class="text-[1.625rem] font-bold text-gray-900 mb-4">
            Need to Report an Incident?
        </h2>

        <p class="text-[1.125rem] text-gray-900 leading-relaxed mb-12">
            Complaints regarding zero-tolerance for drugs and alcohol can be made using these methods:
        </p>

        <!-- File with SilverRide -->
        <h2 class="text-[1.625rem] font-bold text-gray-900 mb-4">
            To file your complaint with SilverRide
        </h2>

        <p class="text-[1.125rem] text-gray-900 leading-relaxed mb-4">
            All covered employees are prohibited from consuming alcohol within four (4) hours prior to the performance of safety-sensitive job functions.
        </p>

        <ul class="space-y-3 text-base text-gray-900 mb-12 list-none pl-0">
            <li class="flex items-start gap-2">
                <span class="text-gray-900 font-medium">&bull;</span>
                <span>Phone: <a href="tel:18006181246" class="text-primary hover:text-primary underline transition-colors">1-800-618-1246</a></span>
            </li>
            <li class="flex items-start gap-2">
                <span class="text-gray-900 font-medium">&bull;</span>
                <span>Email: <a href="mailto:info@silverride.com" class="text-primary hover:text-primary underline transition-colors">info@silverride.com</a></span>
            </li>
            <li class="flex items-start gap-2">
                <span class="text-gray-900 font-medium">&bull;</span>
                <span>Website: <a href="https://www.silverride.com/report-incident" target="_blank" rel="noopener noreferrer" class="text-primary hover:text-primary underline transition-colors">https://www.silverride.com/report-incident</a></span>
            </li>
        </ul>

        <!-- State List -->
        <div class="space-y-10">
            <div id="arizona" class="border-b border-gray-200 pb-4">
                <h3 class="text-[1.375rem] font-bold text-gray-900 mb-2">Arizona</h3>
                <p class="text-[1.125rem] text-gray-900 leading-relaxed">
                    Complete the form on the Arizona Department of Transportation <a href="#" class="text-primary hover:text-primary underline transition-colors">website</a>.
                </p>
            </div>

            <div id="california" class="border-b border-gray-200 pb-4">
                <h3 class="text-[1.375rem] font-bold text-gray-900 mb-2">California</h3>
                <p class="text-[1.125rem] text-gray-900 leading-relaxed">
                    Contact the California Public Utilities Commission by calling <a href="tel:18008949444" class="text-primary hover:text-primary underline transition-colors">1-800-894-9444</a> or emailing <a href="mailto:ciu_intake@cpuc.ca.gov" class="text-primary hover:text-primary underline transition-colors">ciu_intake@cpuc.ca.gov</a>. Or, you can visit their <a href="#" class="text-primary hover:text-primary underline transition-colors">website</a> for more information.
                </p>
            </div>

            <div id="florida" class="border-b border-gray-200 pb-4">
                <h3 class="text-[1.375rem] font-bold text-gray-900 mb-2">Florida</h3>
                <p class="text-[1.125rem] text-gray-900 leading-relaxed">
                    Visit the Department of Agriculture and Consumer Affairs <a href="#" class="text-primary hover:text-primary underline transition-colors">website</a>.
                </p>
            </div>

            <div id="georgia" class="border-b border-gray-200 pb-4">
                <h3 class="text-[1.375rem] font-bold text-gray-900 mb-2">Georgia</h3>
                <p class="text-[1.125rem] text-gray-900 leading-relaxed">
                    Complete the form on the Georgia Department of Public Safety <a href="#" class="text-primary hover:text-primary underline transition-colors">website</a>.
                </p>
            </div>

            <div id="kentucky" class="border-b border-gray-200 pb-4">
                <h3 class="text-[1.375rem] font-bold text-gray-900 mb-2">Kentucky</h3>
                <p class="text-[1.125rem] text-gray-900 leading-relaxed">
                    Complete the form on the Kentucky Transportation Cabinet <a href="#" class="text-primary hover:text-primary underline transition-colors">website</a>.
                </p>
            </div>

            <div id="maryland" class="border-b border-gray-200 pb-4">
                <h3 class="text-[1.375rem] font-bold text-gray-900 mb-2">Maryland</h3>
                <p class="text-[1.125rem] text-gray-900 leading-relaxed">
                    Complete the form on the Maryland Public Service Commission <a href="#" class="text-primary hover:text-primary underline transition-colors">website</a> or contact the Transportation Division at <a href="tel:4107678128" class="text-primary hover:text-primary underline transition-colors">410-767-8128</a>.
                </p>
            </div>

            <div id="massachusetts" class="border-b border-gray-200 pb-4">
                <h3 class="text-[1.375rem] font-bold text-gray-900 mb-2">Massachusetts</h3>
                <p class="text-[1.125rem] text-gray-900 leading-relaxed">
                    Contact the TNC Division at the Department of Public Utilities by emailing <a href="mailto:DPUTNCQuestions@mass.gov" class="text-primary hover:text-primary underline transition-colors">DPUTNCQuestions@mass.gov</a> or calling <a href="tel:6173053569" class="text-primary hover:text-primary underline transition-colors">617-305-3569</a>. For driver questions by visiting the <a href="#" class="text-primary hover:text-primary underline transition-colors">TNC questions page</a> on the TNC Division website.
                </p>
            </div>

            <div id="nevada" class="border-b border-gray-200 pb-4">
                <h3 class="text-[1.375rem] font-bold text-gray-900 mb-2">Nevada</h3>
                <p class="text-[1.125rem] text-gray-900 leading-relaxed">
                    Contact the Nevada Transportation Authority at <a href="tel:7024863303" class="text-primary hover:text-primary underline transition-colors">702-486-3303</a> or complete the form on their <a href="#" class="text-primary hover:text-primary underline transition-colors">website</a>.
                </p>
            </div>

            <div id="new-jersey" class="border-b border-gray-200 pb-4">
                <h3 class="text-[1.375rem] font-bold text-gray-900 mb-2">New Jersey</h3>
                <p class="text-[1.125rem] text-gray-900 leading-relaxed">
                    Contact the New Jersey Motor Vehicle Commission by calling <a href="tel:9735046200" class="text-primary hover:text-primary underline transition-colors">973-504-6200</a> or emailing <a href="mailto:askconsumeraffairs@dca.state.nj.us" class="text-primary hover:text-primary underline transition-colors">askconsumeraffairs@dca.state.nj.us</a>. Or, you can visit their <a href="#" class="text-primary hover:text-primary underline transition-colors">website</a> for more information.
                </p>
            </div>

            <div id="new-mexico" class="border-b border-gray-200 pb-4">
                <h3 class="text-[1.375rem] font-bold text-gray-900 mb-2">New Mexico</h3>
                <p class="text-[1.125rem] text-gray-900 leading-relaxed">
                    Visit the <a href="#" class="text-primary hover:text-primary underline transition-colors">New Mexico Public Regulation Commission</a> website for information on filing a complaint.
                </p>
            </div>

            <div id="pennsylvania" class="border-b border-gray-200 pb-4">
                <h3 class="text-[1.375rem] font-bold text-gray-900 mb-2">Pennsylvania</h3>
                <p class="text-[1.125rem] text-gray-900 leading-relaxed">
                    Call the PUC Consumer Complaint Line by calling <a href="tel:18006927380" class="text-primary hover:text-primary underline transition-colors">1-800-692-7380</a>. Or, you can learn more on the PUC <a href="#" class="text-primary hover:text-primary underline transition-colors">website</a>.
                </p>
            </div>

            <div id="texas" class="border-b border-gray-200 pb-4">
                <h3 class="text-[1.375rem] font-bold text-gray-900 mb-2">Texas</h3>
                <p class="text-[1.125rem] text-gray-900 leading-relaxed">
                    Complete the form on the Texas Department of Licensing and Regulation <a href="#" class="text-primary hover:text-primary underline transition-colors">website</a>.
                </p>
            </div>

            <div id="virginia" class="border-b border-gray-200 pb-4">
                <h3 class="text-[1.375rem] font-bold text-gray-900 mb-2">Virginia</h3>
                <p class="text-[1.125rem] text-gray-900 leading-relaxed">
                    Contact the Virginia Department of Motor Vehicles by calling <a href="tel:8042495130" class="text-primary hover:text-primary underline transition-colors">804-249-5130</a> or emailing <a href="mailto:mcsonline@dmv.virginia.gov" class="text-primary hover:text-primary underline transition-colors">mcsonline@dmv.virginia.gov</a>. Or you can visit the <a href="#" class="text-primary hover:text-primary underline transition-colors">Virginia DMV website</a> for more information.
                </p>
            </div>

            <div id="washington" class="pb-8">
                <h3 class="text-[1.375rem] font-bold text-gray-900 mb-2">Washington</h3>
                <p class="text-[1.125rem] text-gray-900 leading-relaxed">
                    Seattle/King County: Call the Seattle Customer Service Bureau at <a href="tel:2066842489" class="text-primary hover:text-primary underline transition-colors">206-684-2489</a> or complete the form on their <a href="#" class="text-primary hover:text-primary underline transition-colors">website</a>.
                </p>
            </div>
        </div>
    </div>
</section>
