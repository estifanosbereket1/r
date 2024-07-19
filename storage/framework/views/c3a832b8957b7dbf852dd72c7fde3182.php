

<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php echo $__env->make('partials._search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="max-w-screen-lg mx-auto">
        <div class="flex flex-col gap-6">
            <?php if (isset($component)) { $__componentOriginal98df7be4d2d83ea3b787e656b1f8d7eb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal98df7be4d2d83ea3b787e656b1f8d7eb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.heading','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <div class="text-2xl font-bold"><?php echo e($room->title); ?></div>
                <div class="font-light text-neutral-500 mt-2"><?php echo e($room->location); ?></div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal98df7be4d2d83ea3b787e656b1f8d7eb)): ?>
<?php $attributes = $__attributesOriginal98df7be4d2d83ea3b787e656b1f8d7eb; ?>
<?php unset($__attributesOriginal98df7be4d2d83ea3b787e656b1f8d7eb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal98df7be4d2d83ea3b787e656b1f8d7eb)): ?>
<?php $component = $__componentOriginal98df7be4d2d83ea3b787e656b1f8d7eb; ?>
<?php unset($__componentOriginal98df7be4d2d83ea3b787e656b1f8d7eb); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginaleb640f2720ba9efa62c6ed98b848e79c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleb640f2720ba9efa62c6ed98b848e79c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.imagecontainer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('imagecontainer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <img alt="image"
                    src="<?php echo e($room->imageSrc ? asset('storage/' . $room->imageSrc) : asset('/images/images.jpeg')); ?>"
                    class="object-cover w-full h-full" />
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleb640f2720ba9efa62c6ed98b848e79c)): ?>
<?php $attributes = $__attributesOriginaleb640f2720ba9efa62c6ed98b848e79c; ?>
<?php unset($__attributesOriginaleb640f2720ba9efa62c6ed98b848e79c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleb640f2720ba9efa62c6ed98b848e79c)): ?>
<?php $component = $__componentOriginaleb640f2720ba9efa62c6ed98b848e79c; ?>
<?php unset($__componentOriginaleb640f2720ba9efa62c6ed98b848e79c); ?>
<?php endif; ?>

            <div class="grid grid-cols-1 md:grid-cols-7 md:gap-10 mt-6">
                <div class="col-span-4 flex flex-col gap-8">
                    <div class="flex flex-col gap-2">
                        <div class="text-xl font-semibold flex flex-row items-center gap-2">
                            <div>Hosted by <?php echo e(auth()->user()->name); ?></div>
                        </div>
                        <div class="flex flex-row items-center gap-4 font-light text-neutral-500">
                            <div><?php echo e($room->capacity); ?> guests</div>
                        </div>
                        <div class="text-xl font-bold mb-4">$ <?php echo e($room->pricePerNight); ?> /night</div>
                    </div>
                    <hr />
                    <?php if (isset($component)) { $__componentOriginal56202f52dfd40daa6c756a0f1fd91cd3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56202f52dfd40daa6c756a0f1fd91cd3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.listing-tags','data' => ['tagsCsv' => $room->amenities]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('listing-tags'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tagsCsv' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($room->amenities)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal56202f52dfd40daa6c756a0f1fd91cd3)): ?>
<?php $attributes = $__attributesOriginal56202f52dfd40daa6c756a0f1fd91cd3; ?>
<?php unset($__attributesOriginal56202f52dfd40daa6c756a0f1fd91cd3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal56202f52dfd40daa6c756a0f1fd91cd3)): ?>
<?php $component = $__componentOriginal56202f52dfd40daa6c756a0f1fd91cd3; ?>
<?php unset($__componentOriginal56202f52dfd40daa6c756a0f1fd91cd3); ?>
<?php endif; ?>
                    <hr />
                    <div class="text-lg font-light text-neutral-500"><?php echo e($room->description); ?></div>
                    <hr />
                </div>

                <div class="order-1 mb-10 md:order-last md:col-span-3">
                    <div class="bg-white rounded-lg shadow p-4">
                        <h2 class="text-xl font-bold mb-4">Select Dates</h2>
                        <form action="/reservations/rooms/<?php echo e($room->id); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="mb-4">
                                <label for="start_date" class="block text-gray-700 font-bold mb-2">Start Date</label>
                                <input type="text" id="start_date" name="start_date"
                                    class="w-full p-2 border rounded-lg" placeholder="Select start date">
                            </div>
                            <div class="mb-4">
                                <label for="end_date" class="block text-gray-700 font-bold mb-2">End Date</label>
                                <input type="text" id="end_date" name="end_date"
                                    class="w-full p-2 border rounded-lg" placeholder="Select end date">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2">Total Price</label>
                                <div id="total-price" class="text-xl font-bold text-gray-800">$0</div>
                                <input type="hidden" id="total_price_input" name="total_price">
                            </div>
                            <button type="submit"
                                class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700">
                                Reserve
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pricePerNight = <?php echo e($room->pricePerNight); ?>;
            <?php if(isset($reservedDates)): ?>
                const reservedDates = <?php echo json_encode($reservedDates, 15, 512) ?>;
            <?php else: ?>
                const reservedDates = [];
            <?php endif; ?>

            const startDatePicker = flatpickr("#start_date", {
                dateFormat: "Y-m-d",
                disable: reservedDates,
                onChange: function(selectedDates, dateStr, instance) {
                    const endDatePicker = flatpickr("#end_date", {
                        dateFormat: "Y-m-d",
                        minDate: dateStr,
                        disable: reservedDates,
                        onChange: calculateTotalPrice
                    });
                    endDatePicker.open();
                }
            });

            flatpickr("#end_date", {
                dateFormat: "Y-m-d",
                disable: reservedDates,
                onChange: calculateTotalPrice
            });

            function calculateTotalPrice() {
                const startDate = startDatePicker.selectedDates[0];
                const endDate = flatpickr("#end_date").selectedDates[0];
                if (startDate && endDate) {
                    const oneDay = 24 * 60 * 60 * 1000;
                    const diffDays = Math.round(Math.abs((endDate - startDate) / oneDay));
                    const totalPrice = diffDays * pricePerNight;
                    document.getElementById('total-price').textContent = `$${totalPrice}`;
                    document.getElementById('total_price_input').value = totalPrice;
                }
            }
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\r\resources\views/rooms/show.blade.php ENDPATH**/ ?>