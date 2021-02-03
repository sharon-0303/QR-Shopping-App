package com.example.shop;

import android.os.Bundle;
import android.app.Activity;
import android.content.Intent;
import android.view.Menu;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class Vprodet extends Activity {
	TextView tv1,tv2,tv3,tv4;
	Button b1;
	

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_vprodet);
		tv1=(TextView)findViewById(R.id.textView3);
		tv2=(TextView)findViewById(R.id.textView5);
		tv3=(TextView)findViewById(R.id.textView7);
		tv4=(TextView)findViewById(R.id.textView9);
		b1=(Button)findViewById(R.id.button1);
		
		tv1.setText(ViewProduct.pname[ViewProduct.pos]);
		tv2.setText(ViewProduct.brand[ViewProduct.pos]);
		tv3.setText(ViewProduct.utime[ViewProduct.pos]);
		tv4.setText(ViewProduct.price[ViewProduct.pos]);
		b1.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				Intent i=new Intent(getApplicationContext(),ViewProduct.class);
				startActivity(i);
			}
		});
	}

	
}
