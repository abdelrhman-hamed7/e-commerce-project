<span class="badge badge-brand"><?php echo htmlspecialchars($row['brand']); ?></span>
                            <div class="card-body d-flex flex-column pt-4">
                                <h5 class="card-title fw-bold text-dark mb-2"><?php echo htmlspecialchars($row['name']); ?></h5>
                                <p class="card-text text-muted flex-grow-1 small"><?php echo htmlspecialchars($row['description']); ?></p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="price-tag">$<?php echo number_format($row['price'], 2); ?></span>
                                    <a href="product-details.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-dark px-3 rounded-pill">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>

    <section id="accessories" class="bg-white py-5 border-top border-bottom">
        <div class="container">
            <h2 class="fw-bold mb-4 border-start border-4 border-warning ps-3">Manufacturer Accessories</h2>
            <div class="row g-4">
                <?php if ($accessories_result && $accessories_result->num_rows > 0): ?>
                    <?php while($row = $accessories_result->fetch_assoc()): ?>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card h-100 product-card position-relative shadow-sm p-3 border-light">
                                <span class="badge bg-secondary position-absolute" style="top:15px; left:15px;"><?php echo htmlspecialchars($row['brand']); ?></span>
                                <div class="card-body d-flex flex-column pt-4">
                                    <h5 class="card-title fw-bold text-dark mb-2"><?php echo htmlspecialchars($row['name']); ?></h5>
                                    <p class="card-text text-muted flex-grow-1 small"><?php echo htmlspecialchars($row['description']); ?></p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="price-tag">$<?php echo number_format($row['price'], 2); ?></span>
                                        <a href="product-details.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-dark px-3 rounded-pill">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <footer class="text-center py-4 bg-dark text-white-50">
        <div class="container">
            <p class="mb-1">&copy; 2026 AuraTech Agency Rwanda | Official E-Commerce Platform Framework</p>
            <small>Designed by Reem Osama - Student Academic Submission under Git-Flow Validation</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>