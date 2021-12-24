BEGIN
		DECLARE new_price int;
        DECLARE current_pri int;
        DECLARE current_price int;
   
                
        SELECT stock INTO current_price FROM products WHERE id = product_id;
        SET new_price = current_price + n_quantity;   
        UPDATE products SET stock = new_price WHERE id = product_id;
        
        SELECT new_price;
END