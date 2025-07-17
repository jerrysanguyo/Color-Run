<div x-show="showConsentModal" x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 px-4">
    <div @click.away="showConsentModal = false"
        class="bg-white rounded-lg shadow-lg p-6 max-w-2xl w-full overflow-y-auto max-h-[90vh] space-y-4" x-data="{
            seeMore: { a: false, b: false, c: false },
            truncate(text, limit = 50) {
                return text.length > limit ? text.substring(0, limit) + '...' : text;
            }
        }">
        <div class="flex justify-between items-start border-b pb-2 mb-2">
            <h2 class="text-lg font-bold text-gray-600">Declarations & Consent</h2>
            <button @click="showConsentModal = false"
                class="text-gray-400 hover:text-gray-600 text-2xl leading-none">&times;</button>
        </div>
        <div class="space-y-4 text-sm text-gray-700">
            <label class="flex items-start space-x-2 p-4 bg-gray-50 border border-gray-200 rounded-md">
                <input type="checkbox" name="agree1" required class="mt-1 text-pink-600"
                    {{ old('agree1') ? 'checked' : '' }}>
                <span>
                    <strong class="text-gray-800 block mb-1">Reminder Compliance</strong>
                    <template x-if="!seeMore.a">
                        <span
                            x-text="truncate(`I understand the mentioned reminders and agree to follow all the rules and guidelines that will be implemented in the activity for the security and safety of everyone. Aking nauunawaan ang lahat ng paalala at ako'y susunod sa lahat ng patnubay na inilahad para sa seguridad at kaligtasan ng lahat ng kalahok.`)"></span>
                    </template>
                    <template x-if="seeMore.a">
                        <span>
                            I understand the mentioned reminders and agree to follow all the rules and guidelines that
                            will be implemented in the activity for the security and safety of everyone.<br>
                            <em>Aking nauunawaan ang lahat ng paalala at ako'y susunod sa lahat ng patnubay na inilahad
                                para sa seguridad at kaligtasan ng lahat ng kalahok.</em>
                        </span>
                    </template>
                    <button type="button" @click="seeMore.a = !seeMore.a"
                        class="text-blue-600 underline ml-1 block mt-1">
                        <span x-show="!seeMore.a">See more</span>
                        <span x-show="seeMore.a">Show less</span>
                    </button>
                </span>
            </label>
            <label class="flex items-start space-x-2 p-4 bg-gray-50 border border-gray-200 rounded-md">
                <input type="checkbox" name="agree2" required class="mt-1 text-pink-600"
                    {{ old('agree2') ? 'checked' : '' }}>
                <span>
                    <strong class="text-gray-800 block mb-1">PAGPAPAHINTULOT</strong>
                    <template x-if="!seeMore.b">
                        <span
                            x-text="truncate(`Ako ay kalahok sa Color Fun Run 2025 at kusang-loob na nagbibigay ng pahintulot upang makibahagi sa nasabing aktibidad. Nabasa at lubos kong naunawaan ang mga polisiya at regulasyon ukol sa okasyong ito...`)"></span>
                    </template>
                    <template x-if="seeMore.b">
                        <span>
                            Ako ay kalahok sa Color Fun Run 2025 at kusang-loob na nagbibigay ng pahintulot upang
                            makibahagi sa nasabing aktibidad. Nabasa at lubos kong naunawaan ang mga polisiya at
                            regulasyon ukol sa okasyong ito, at ako ay kusang-loob na pumapayag na lumahok.

                            Aking pinapahayag na ako ay nasa maayos na kalusugan at kalagayan bago sumali sa aktibidad.
                            Nauunawaan ko rin na walang pananagutan ang mga organizer at staff sa anumang insidente o
                            pangyayaring hindi inaasahan o hindi kontrolado na maaaring mangyari sa mga kalahok ng
                            nasabing okasyon.

                            Ako rin ay nagbibigay ng pahintulot na ako ay makunan ng litrato o video habang isinasagawa
                            ang aktibidad, at sumasang-ayon ako na maaaring gamitin ang mga ito para sa dokumentasyon,
                            promotions, at iba pang opisyal na layunin ng mga organizer ng aktibidad.
                        </span>
                    </template>
                    <button type="button" @click="seeMore.b = !seeMore.b"
                        class="text-blue-600 underline ml-1 block mt-1">
                        <span x-show="!seeMore.b">See more</span>
                        <span x-show="seeMore.b">Show less</span>
                    </button>
                </span>
            </label>
            <label class="flex items-start space-x-2 p-4 bg-gray-50 border border-gray-200 rounded-md">
                <input type="checkbox" name="agree3" required class="mt-1 text-pink-600"
                    {{ old('agree3') ? 'checked' : '' }}>
                <span>
                    <strong class="text-gray-800 block mb-1">PRIVACY NOTICE</strong>
                    <template x-if="!seeMore.c">
                        <span
                            x-text="truncate(`Ako ay nagbibigay ng aking pahintulot sa Taguig Persons with Disabilities Affairs Office (PDAO) at Taguig Yakap Center for Children with Disabilities na gamitin, iproseso, at itago ang lahat ng datos...`)"></span>
                    </template>
                    <template x-if="seeMore.c">
                        <span>
                            Ako ay nagbibigay ng aking pahintulot sa Taguig Persons with Disabilities Affairs Office
                            (PDAO) at Taguig Yakap Center for Children with Disabilities na gamitin, iproseso, at itago
                            ang lahat ng datos na nakalap mula sa akin, alinsunod sa Republic Act No. 10173 o mas kilala
                            bilang Data Privacy Act of 2012. Lubos kong nauunawaan na ang lahat ng impormasyong aking
                            ibinigay ay dapat protektahan at pangalagaan alinsunod sa mga probisyon ng batas na ito.
                        </span>
                    </template>
                    <button type="button" @click="seeMore.c = !seeMore.c"
                        class="text-blue-600 underline ml-1 block mt-1">
                        <span x-show="!seeMore.c">See more</span>
                        <span x-show="seeMore.c">Show less</span>
                    </button>
                </span>
            </label>
        </div>
        <div class="flex justify-end pt-4">
            <button type="button" @click="showConsentModal = false"
                class="px-4 py-2 mr-2 text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-100 transition">
                Cancel
            </button>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-pink-700 transition">
                Confirm & Submit
            </button>
        </div>
    </div>
</div>