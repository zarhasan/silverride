<?php
/**
 * Policy Section with Table of Contents
 *
 * Expected $args:
 * - title: string
 * - image: array (url, alt)
 * - effective_date: string
 * - toc_title: string (default: 'Table of Contents')
 * - sections: array of section arrays
 *   - heading: string
 *   - id: string (anchor slug)
 *   - content: string (HTML)
 */
$title          = $args['title'] ?? 'Drug and Alcohol Policy';
$image          = $args['image'] ?? ['url' => 'https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?w=1200&q=80', 'alt' => 'Vehicle steering wheel close-up'];
$effective_date = $args['effective_date'] ?? 'Policy Effective Date (revised) JULY 30, 2021';
$toc_title      = $args['toc_title'] ?? 'Table of Contents';
$sections       = $args['sections'] ?? [];

// Default sections if none provided
if ( empty( $sections ) ) {
    $sections = [
        [
            'heading' => '1.0 Purpose of Policy',
            'id'      => 'purpose-of-policy',
            'content' => '<p>This policy complies with 49 CFR Part 655, as amended and 49 CFR Part 40, as amended. Copies of Parts 655 and 40 are available in the drug and alcohol program manager\'s office and can be found on the internet at the Federal Transit Administration (FTA) Drug and Alcohol Program website.</p><p class="mt-4"><a href="http://transit-safety.fta.dot.gov/DrugAndAlcohol/" class="text-primary underline hover:text-primary transition-colors duration-200">http://transit-safety.fta.dot.gov/DrugAndAlcohol/</a></p><p class="mt-4">All covered employees are required to submit to drug and alcohol tests as a condition of employment in accordance with 49 CFR Part 655.</p><p class="mt-4">Portions of this policy are not FTA-mandated, but reflect SilverRide Inc.\'s policy. These additional provisions are identified by <strong>bold text</strong>.</p><p class="mt-4">In addition, DOT has published 49 CFR Part 32, implementing the Drug-Free Workplace Act of 1988, which requires the establishment of drug-free workplace policies and the reporting of certain drug-related offenses to the FTA.</p><p class="mt-4"><strong>All SilverRide Inc. employees are subject to the provisions of the Drug-Free Workplace Act of 1988.</strong></p><p class="mt-4"><strong>The unlawful manufacture, distribution, dispensation, possession or use of a controlled substance is prohibited in the covered workplace. An employee who is convicted of any criminal drug statute for a violation occurring in the workplace shall notify the local DER no later than five days after such conviction.</strong></p>',
        ],
        [
            'heading' => '2.0 Covered Employees',
            'id'      => 'covered-employees',
            'content' => '<p>This policy applies to every person, including an applicant or transferee, who performs or will perform a "safety-sensitive function" as defined in Part 655, section 655.4.</p><p class="mt-4">You are a covered employee if you perform any of the following:</p><ul class="list-disc pl-6 mt-2 space-y-1"><li>Operating a revenue service vehicle, in or out of revenue service</li><li>Operating a non-revenue vehicle requiring a commercial driver\'s license</li><li>Controlling movement or dispatch of a revenue service vehicle</li><li>Maintaining (including repairs, overhaul and rebuilding) of a revenue service vehicle or equipment used in revenue service</li><li>Carrying a firearm for security purposes</li></ul><p class="mt-4">See <a href="#attachment-a-covered-positions" class="text-primary underline hover:text-primary transition-colors duration-200">Attachment A</a> for a list of covered positions by job title.</p>',
        ],
        [
            'heading' => '3.0 Prohibited Behavior',
            'id'      => 'prohibited-behavior',
            'content' => '<p>Use of illegal drugs is prohibited at all times. Prohibited drugs include:</p><ul class="list-disc pl-6 mt-2 space-y-1"><li>marijuana</li><li>cocaine</li><li>phencyclidine (PCP)</li><li>opioids</li><li>amphetamines</li></ul><p class="mt-4">All covered employees are prohibited from performing or continuing to perform safety-sensitive functions while having an alcohol concentration of 0.04 or greater.</p><p class="mt-4">All covered employees are prohibited from consuming alcohol while performing safety-sensitive job functions or while on-call to perform safety-sensitive job functions. If an on-call employee has consumed alcohol, they must acknowledge the use of alcohol at the time that they are called to report for duty. If the on-call employee does not have the ability to perform his or her safety-sensitive function, he or she must take an alcohol test with a result of less than 0.02 prior to performance.</p><p class="mt-4">All covered employees are prohibited from consuming alcohol within four (4) hours prior to the performance of safety-sensitive job functions.</p><p class="mt-4">All covered employees required to take a post-accident test are prohibited from consuming alcohol for eight (8) hours following involvement in an accident or until he or she submits to the post-accident drug and alcohol test, whichever occurs first.</p>',
        ],
        [
            'heading' => '4.0 Consequences for Violations',
            'id'      => 'consequences-for-violations',
            'content' => '<p>Following a positive drug or alcohol (BAC at or above 0.04) test result or test refusal, the employee will be immediately removed from safety-sensitive duty and provided with contact information for Substance Abuse Professionals (SAPs).</p><p class="mt-4">Following a BAC of 0.02 or greater, but less than 0.04, the employee will be immediately removed from safety-sensitive duties until the start of their next regularly scheduled duty period (but for not less than eight hours) unless a retest results in the employee\'s alcohol concentration being less than 0.02.</p><h4 class="font-bold text-gray-900 mt-6 mb-2">Zero Tolerance</h4><p><strong>Per SilverRide Inc. policy, any employee who tests positive for drugs or alcohol (BAC at or above 0.04) or refuses to test will be terminated from employment.</strong></p>',
        ],
        [
            'heading' => '5.0 Circumstances for Testing',
            'id'      => 'circumstances-for-testing',
            'content' => '<h4 class="font-bold text-gray-900 mt-2 mb-2">Pre-Employment Testing</h4><p>A negative pre-employment drug test result is required before an employee can first perform safety-sensitive functions. If a pre-employment test is cancelled, the individual will be required to undergo another test and successfully pass with a verified negative result before performing safety-sensitive functions.</p><p class="mt-4">If a covered employee has not performed a safety-sensitive function for 90 or more consecutive calendar days, and has not been in the random testing pool during that time, the employee must take and pass a pre-employment test before he or she can return to a safety-sensitive function.</p><p class="mt-4">A covered employee or applicant who has previously failed or refused a DOT drug and/or alcohol test must provide proof of having successfully completed a referral, evaluation, and treatment plan meeting DOT requirements.</p><h4 class="font-bold text-gray-900 mt-6 mb-2">Reasonable Suspicion Testing</h4><p>All covered employees shall be subject to a drug and/or alcohol test when SilverRide Inc. has reasonable suspicion to believe that the covered employee has used a prohibited drug and/or engaged in alcohol misuse. A reasonable suspicion referral for testing will be made by a trained supervisor or other trained company official on the basis of specific, contemporaneous, articulable observations concerning the appearance, behavior, speech, or body odors of the covered employee.</p><p class="mt-4">Covered employees may be subject to reasonable suspicion drug testing any time while on duty. Covered employees may be subject to reasonable suspicion alcohol testing while the employee is performing safety-sensitive functions, just before the employee is to perform safety-sensitive functions, or just after the employee has ceased performing such functions.</p><h4 class="font-bold text-gray-900 mt-6 mb-2">Post-Accident Testing</h4><p>Covered employees shall be subject to post-accident drug and alcohol testing under the following circumstances:</p><h5 class="font-semibold text-gray-900 mt-4 mb-1">Fatal Accidents</h5><p>As soon as practicable following an accident involving the loss of a human life, drug and alcohol tests will be conducted on each surviving covered employee operating the public transportation vehicle at the time of the accident. In addition, any other covered employee whose performance could have contributed to the accident, as determined by SilverRide Inc. using the best information available at the time of the decision, will be tested.</p><h5 class="font-semibold text-gray-900 mt-4 mb-1">Non-fatal Accidents</h5><p>As soon as practicable following an accident not involving the loss of a human life, drug and alcohol tests will be conducted on each covered employee operating the public transportation vehicle at the time of the accident if at least one of the following conditions is met:</p><ul class="list-disc pl-6 mt-2 space-y-1"><li>The accident results in injuries requiring immediate medical treatment away from the scene, unless the covered employee can be completely discounted as a contributing factor to the accident</li><li>One or more vehicles incurs disabling damage and must be towed away from the scene, unless the covered employee can be completely discounted as a contributing factor to the accident</li></ul><p class="mt-4">In addition, any other covered employee whose performance could have contributed to the accident, as determined by SilverRide Inc. using the best information available at the time of the decision, will be tested.</p><p class="mt-4">A covered employee subject to post-accident testing must remain readily available, or it is considered a refusal to test. Nothing in this section shall be construed to require the delay of necessary medical attention for the injured following an accident or to prohibit a covered employee from leaving the scene of an accident for the period necessary to obtain assistance in responding to the accident or to obtain necessary emergency medical care.</p><h4 class="font-bold text-gray-900 mt-6 mb-2">Random Testing</h4><p>Random drug and alcohol tests are unannounced and unpredictable, and the dates for administering random tests are spread reasonably throughout the calendar year. Random testing will be conducted at all times of the day when safety-sensitive functions are performed.</p><p class="mt-4">Testing rates will meet or exceed the minimum annual percentage rate set each year by the FTA administrator. The current year testing rates can be viewed online at:<br><a href="https://www.transportation.gov/odapc/random-testing-rates" class="text-primary underline hover:text-primary transition-colors duration-200">www.transportation.gov/odapc/random-testing-rates</a>.</p><p class="mt-4">The selection of employees for random drug and alcohol testing will be made by a scientifically valid method, such as a random number table or a computer-based random number generator. Under the selection process used, each covered employee will have an equal chance of being tested each time selections are made.</p><p class="mt-4">A covered employee may only be randomly tested for alcohol misuse while the employee is performing safety-sensitive functions, just before the employee is to perform safety-sensitive functions, or just after the employee has ceased performing such functions. A covered employee may be randomly tested for prohibited drug use anytime while on duty.</p><p class="mt-4">Each covered employee who is notified of selection for random drug or random alcohol testing must immediately proceed to the designated testing site.</p>',
        ],
        [
            'heading' => '6.0 Testing Procedures',
            'id'      => 'testing-procedures',
            'content' => '<p>All FTA drug and alcohol testing will be conducted in accordance with 49 CFR Part 40, as amended.</p><h4 class="font-bold text-gray-900 mt-6 mb-2">Dilute Urine Specimen</h4><p>If there is a negative dilute test result, SilverRide Inc. will conduct one additional retest. The result of the second test will be the test of record.</p><p class="mt-4">Dilute negative results with a creatinine level greater than or equal to 2 mg/dL but less than or equal to 5 mg/dL require an immediate recollection under direct observation (see 49 CFR Part 40, section 40.67).</p><h4 class="font-bold text-gray-900 mt-6 mb-2">Split Specimen Test</h4><p>In the event of a verified positive test result, or a verified adulterated or substituted result, the employee can request that the split specimen be tested at a second laboratory. SilverRide Inc. guarantees that the split specimen test will be conducted in a timely fashion. <strong>The cost of the test will be covered by the employee.</strong></p>',
        ],
        [
            'heading' => '7.0 Test Refusals',
            'id'      => 'test-refusals',
            'content' => '<p>As a covered employee, you have refused to test if you:</p><ul class="list-disc pl-6 mt-2 space-y-1"><li>Fail to appear for any test (except a pre-employment test) within a reasonable time, as determined by SilverRide Inc.</li><li>Fail to remain at the testing site until the testing process is complete. An employee who leaves the testing site before the testing process commences for a pre-employment test has not refused to test.</li><li>Fail to provide a specimen for a drug or alcohol test. An employee who does not provide a specimen because he or she has left the testing site before the testing process commenced for a pre-employment test has not refused to test.</li><li>In the case of a directly-observed or monitored urine drug collection, fail to permit monitoring or observation of your provision of a specimen.</li><li>Fail to provide a sufficient specimen for a drug or alcohol test without a valid medical explanation.</li><li>Fail or decline to take a second drug test as directed by the collector or SilverRide Inc.</li><li>Fail to undergo a medical evaluation as required by the MRO or SilverRide Inc.\'s Designated Employer Representative (DER).</li><li>Fail to cooperate with any part of the testing process.</li><li>Fail to follow an observer\'s instructions to raise and lower clothing and turn around during a directly-observed urine drug test.</li><li>Possess or wear a prosthetic or other device used to tamper with the collection process.</li><li>Admit to the adulteration or substitution of a specimen to the collector or MRO.</li><li>Refuse to sign the certification at Step 2 of the Alcohol Testing Form (ATF).</li><li>Fail to remain readily available following an accident.</li></ul><p class="mt-4">As a covered employee, if the MRO reports that you have a verified adulterated or substituted test result, you have refused to take a drug test.</p><p class="mt-4">As a covered employee, if you refuse to take a drug and/or alcohol test, you incur the same consequences as testing positive and will be immediately removed from performing safety-sensitive functions, and provided with contact information for SAPs.</p>',
        ],
        [
            'heading' => '8.0 Prescription Drug Use',
            'id'      => 'prescription-drug-use',
            'content' => '<p>The appropriate use of legally prescribed drugs and non-prescription medications is not prohibited. However, the use of any substance which carries a warning label that indicates that mental functioning, motor skills, or judgment may be adversely affected must be reported to the local DER. Medical advice should be sought, as appropriate, while taking such medication and before performing safety-sensitive duties.</p>',
        ],
        [
            'heading' => '9.0 Contact Person',
            'id'      => 'contact-person',
            'content' => '<p>For questions about SilverRide Inc.\'s anti-drug and alcohol misuse program, contact the company DAPM, Santosh Kurnaz.</p><p class="mt-2"><a href="mailto:santoshk@silverride.com" class="text-primary underline hover:text-primary transition-colors duration-200">santoshk@silverride.com</a></p><p class="mt-4">Or in Southern California, the local DAPM, Duijuan Gutierrez, <a href="mailto:Duijuan@silverride.com" class="text-primary underline hover:text-primary transition-colors duration-200">Duijuan@silverride.com</a>.</p>',
        ],
    ];
}
?>

<section class="bg-white py-12 md:py-16">
  <div class="mx-auto max-w-7xl px-6">
    <h1 class="text-3xl font-bold text-gray-900 md:text-4xl lg:text-5xl"><?php echo esc_html( $title ); ?></h1>

    <?php if ( ! empty( $image ) ) : ?>
    <div class="mt-12">
      <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ?? $title ); ?>" class="w-full rounded-lg object-cover h-[29.75rem]">
    </div>
    <?php endif; ?>

    <div class="mt-10 flex flex-col gap-12 lg:flex-row lg:gap-16">
      <!-- Main Content -->
      <div class="flex-1">
        <?php if ( ! empty( $effective_date ) ) : ?>
            <p class="text-xl font-medium text-primary"><?php echo esc_html( $effective_date ); ?></p>
        <?php endif; ?>

        <?php foreach ( $sections as $section ) :
          $section_heading = $section['heading'] ?? '';
          $section_id      = $section['id'] ?? '';
          $section_content = $section['content'] ?? '';
        ?>
        <section id="<?php echo esc_attr( $section_id ); ?>" class="mb-10 scroll-mt-24 mt-9">
          <h2 class="text-lg font-bold uppercase tracking-wide text-gray-900 md:text-2xl"><?php echo esc_html( $section_heading ); ?></h2>
          <div class="mt-3 text-sm leading-7 text-gray-700">
            <?php echo wp_kses_post( $section_content ); ?>
          </div>
        </section>
        <?php endforeach; ?>

        <!-- Attachment A -->
        <section id="attachment-a-covered-positions" class="mb-10 scroll-mt-24">
          <h2 class="text-lg font-bold uppercase tracking-wide text-gray-900 md:text-xl">ATTACHMENT A: COVERED POSITIONS</h2>
          <div class="mt-3 text-sm leading-7 text-gray-700">
            <p>List of covered positions by job title to be provided separately.</p>
          </div>
        </section>
      </div>

      <!-- Table of Contents -->
      <aside class="lg:w-64 xl:w-72">
        <div class="sticky top-[10rem]">
          <h2 class="text-xl font-bold text-black"><?php echo esc_html( $toc_title ); ?></h2>
          <nav aria-label="Table of contents" class="mt-4">
            <ul class="space-y-3 border-l-2 border-gray-200 pl-4">
              <?php foreach ( $sections as $section ) :
                $toc_label = $section['heading'] ?? '';
                $toc_id    = $section['id'] ?? '';
              ?>
              <li>
                <a href="#<?php echo esc_attr( $toc_id ); ?>" class="block text-sm text-gray-600 transition-colors duration-200 hover:text-primary hover:underline">
                  <?php echo esc_html( $toc_label ); ?>
                </a>
              </li>
              <?php endforeach; ?>
              <li>
                <a href="#attachment-a-covered-positions" class="block text-sm text-gray-600 transition-colors duration-200 hover:text-primary hover:underline">
                  ATTACHMENT A: COVERED POSITIONS
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </aside>
    </div>
  </div>
</section>
