   <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="odd gradeX">
                                <td scope="row"><?php echo e($loop->index+1); ?></td>
                                    <td><?php echo e($item->id); ?></td>
                                    <td><?php echo e($item->ten_tac_gia); ?></td>
                                    <td class="center">4</td>
                                    <td class="center">
                                        <?php if($item->trang_thai == 1): ?>
                                                <?php echo e($item->trang_thai = 'Enable'); ?>

                                        <?php else: ?>
                                                <?php echo e($item->trang_thai = 'Disable'); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-primary btn-circle" title="Tất cả truyện" >
                                            <i class="fa fa-list-ul"></i>
                                        </a> 
                                    <a data-toggle="modal" id="<?php echo e($item->id); ?>" data-target="#sua" class="btn btn-success btn-circle btn-sua" title="Chỉnh sửa tác giả">
                                            <i class="fa  fa-edit"></i>
                                        </a>
                                        <a id="<?php echo e($item->id); ?>" class="btn btn-danger btn-circle btn-xoa" title="Xóa tác giả">
                                            <i class="fa fa-close"></i></a></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\HocTap\xampp\htdocs\NhomTruyenLaravel\resources\views/admin/ql_tac_gia_ajax_get.blade.php ENDPATH**/ ?>