package com.example.shop;

import android.os.Bundle;
import android.app.Activity;
import android.content.Intent;
import android.view.Menu;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class Home extends Activity {

	TextView tv1,tv2,tv3,tv4,tv5,tv6,tv;
	Button b1;
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_home);
		
		tv1=(TextView)findViewById(R.id.textView2);
		tv2=(TextView)findViewById(R.id.textView7);
		tv3=(TextView)findViewById(R.id.textView6);
		tv4=(TextView)findViewById(R.id.textView4);
		tv5=(TextView)findViewById(R.id.textView3);
		tv6=(TextView)findViewById(R.id.textView8);
		
		tv=(TextView)findViewById(R.id.textView5);
		b1=(Button)findViewById(R.id.button1);
		
		tv1.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				Intent i=new Intent(getApplicationContext(),Set_threshold.class);
				startActivity(i);
				
			}
		});
		
      tv2.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				Intent i=new Intent(getApplicationContext(),ViewProduct.class);
				startActivity(i);
				
			}
		});
      
      tv3.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				Intent i=new Intent(getApplicationContext(),Offers.class);
				startActivity(i);
				
			}
		});
      
      tv4.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				Intent i=new Intent(getApplicationContext(),Contactus.class);
				startActivity(i);
				
			}
		});
      
      tv5.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				Intent i=new Intent(getApplicationContext(),Rating.class);
				startActivity(i);
				
			}
		});
      
      tv6.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				Intent i=new Intent(getApplicationContext(),Mycart.class);
				startActivity(i);
				
			}
		});
      b1.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				finish();
				
			}
		});
     
	}
	@Override
	public void onBackPressed() {
		// TODO Auto-generated method stub
		super.onBackPressed();
		Intent i=new Intent(getApplicationContext(),Login.class);
		startActivity(i);
	}


}
